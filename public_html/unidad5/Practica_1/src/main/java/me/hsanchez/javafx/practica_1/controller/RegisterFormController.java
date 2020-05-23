/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.javafx.practica_1.controller;

import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Scene;
import javafx.scene.control.ColorPicker;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DateCell;
import javafx.scene.control.DatePicker;
import javafx.scene.control.TextInputControl;
import javafx.scene.paint.Color;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.util.Callback;
import javafx.util.StringConverter;
import me.hsanchez.javafx.practica_1.App;
import me.hsanchez.javafx.practica_1.utils.FXMLDialogLoader;
import org.apache.commons.validator.routines.EmailValidator;
import org.apache.commons.validator.routines.RegexValidator;
import org.apache.commons.validator.routines.UrlValidator;
import org.controlsfx.control.CheckComboBox;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class RegisterFormController implements Initializable {

    @FXML
    private TextInputControl nameInput;

    @FXML
    private TextInputControl firstSurnameInput;

    @FXML
    private TextInputControl secondSurnameInput;

    @FXML
    private DatePicker birthdateInput;

    @FXML
    private ColorPicker colorInput;

    @FXML
    private TextInputControl filenameInput;

    @FXML
    private ComboBox<String> interestInput;

    @FXML
    private TextInputControl emailInput;

    @FXML
    private TextInputControl passwordInput;

    @FXML
    private TextInputControl urlInput;

    @FXML
    private CheckComboBox<String> hobbiesInput;

    @FXML
    private DatePicker signUpDateInput;
    
    private final RegexValidator passowordValidator;

    public RegisterFormController() {
        this.passowordValidator = new RegexValidator("\\d{2}_[A-Z]{2}\\d[a-z]", false);
    }

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        List<String> interests = new ArrayList<>(2);
        interests.add("Humanidades");
        interests.add("Ciencias exactas");
        this.interestInput.setItems(FXCollections.observableArrayList(interests));

        List<String> hobbies = new ArrayList<>(4);
        hobbies.add("Realizar deportes");
        hobbies.add("Jugar videojuegos");
        hobbies.add("Escuchar música");
        hobbies.add("Otro");
        this.hobbiesInput.getItems().addAll(hobbies);

        String pattern = "dd-MM";
        LocalDate now = LocalDate.now();
        
        final Callback<DatePicker, DateCell> cb = (p) -> {
            return new DateCell() {
                @Override
                public void updateItem(LocalDate ld, boolean bln) {
                    super.updateItem(ld, bln);
                    setDisable(ld.isAfter(now));
                }
            };
        };

        this.birthdateInput.setShowWeekNumbers(false);
        this.birthdateInput.setPromptText(pattern);
        this.birthdateInput.setDayCellFactory(cb);
        this.birthdateInput.getEditor().setDisable(true);
        this.birthdateInput.setConverter(new StringConverter<LocalDate>() {
            
            DateTimeFormatter formatter = DateTimeFormatter.ofPattern(pattern);
            
            @Override
            public String toString(LocalDate date) {
                if(date != null) {
                    return formatter.format(date);
                }
                
                return "";
            }

            @Override
            public LocalDate fromString(String string) {
                if(string != null && !string.isEmpty())
                    return LocalDate.parse(string, formatter);
                return null;
            }

        });
        
        this.signUpDateInput.setDayCellFactory(cb);
        this.signUpDateInput.getEditor().setDisable(true);
    }

    public void onSelectFile() {
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Selecciona una imagen");
        fileChooser.getExtensionFilters().addAll(
                new FileChooser.ExtensionFilter("Imágenes", "*.png", "*.jpg")
        );
        
        File selectedFile = fileChooser.showOpenDialog(App.getMainScene().getWindow());
        if(selectedFile != null) {
            this.filenameInput.setText(selectedFile.getName());
        }
    }

    public void onSave() {
        try {
            List<String> errors = this.checkFormErrors();

            if (errors.isEmpty()) {
                this.showSuccessDialog(this.getFullName());
                this.resetForm();
            } else {
                this.showErrorDialog(errors);
            }
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }

    private void showSuccessDialog(String user) throws IOException {
        SuccessRegisterDialogController controller = new SuccessRegisterDialogController();
        controller.setUser(user);
        FXMLLoader loader = FXMLDialogLoader.getLoaderFor("SuccessRegisterDialog", controller);

        Scene scene = new Scene(loader.load(), 350, 150);
        Stage stage = FXMLDialogLoader.createStage(scene, App.getMainScene().getWindow());
        stage.setTitle("Registro");
        stage.show();
    }

    private void showErrorDialog(List<String> errors) throws IOException {
        ErrorRegisterDialogController controller = new ErrorRegisterDialogController();
        controller.setErrors(errors);
        FXMLLoader loader = FXMLDialogLoader.getLoaderFor("ErrorRegisterDialog", controller);

        Scene scene = new Scene(loader.load(), 300, 300);
        Stage stage = FXMLDialogLoader.createStage(scene, App.getMainScene().getWindow());
        stage.setTitle("Registro");
        stage.show();
    }

    private List<String> checkFormErrors() {
        List<String> errors = new ArrayList<>(11);

        String name = this.nameInput.getText();
        if (name.isBlank()) {
            errors.add("El nombre es requerido");
        }

        String firstname = this.firstSurnameInput.getText();
        if (firstname.isBlank()) {
            errors.add("El apellido paterno es requerido");
        }

        String secondname = this.secondSurnameInput.getText();
        if (secondname.isBlank()) {
            errors.add("El apellido materno es requerido");
        }

        LocalDate birthdate = this.birthdateInput.getValue();
        if (birthdate == null) {
            errors.add("La fecha de nacimiento es requerida");
        }

        String filename = this.filenameInput.getText();
        if (filename.isBlank()) {
            errors.add("La fotografía es requerida");
        }

        String interest = this.interestInput.getValue();
        if (interest == null) {
            errors.add("El área de interés es requerida");
        }

        String email = this.emailInput.getText();
        if (email.isBlank()) {
            errors.add("El correo electrónico es requerido");
        } else if(!EmailValidator.getInstance().isValid(email)) {
            errors.add("El correo no es válido");
        }

        String password = this.passwordInput.getText();
        if (password.isBlank()) {
            errors.add("La contraseña es requerida");
        } else if(!this.passowordValidator.isValid(password)) {
            errors.add("La contraseña no es válida, debe ingresar 2 números, un guión bajo, 2 letras mayúsculas, un número y una letra minúscula");
        }

        String url = this.urlInput.getText();
        if (url.isBlank()) {
            errors.add("La página personal es requerida");
        } else if (!UrlValidator.getInstance().isValid(url)) {
            errors.add("La página personal no es una dirección web válida");
        }

        ObservableList<Integer> checkedIndices = this.hobbiesInput.getCheckModel().getCheckedIndices();
        if (checkedIndices.isEmpty()) {
            errors.add("Debe seleccionar almenos un pasatiempo");
        }

        LocalDate signUpDate = this.signUpDateInput.getValue();
        if (signUpDate == null) {
            errors.add("La fecha de ingreso es requerida");
        }

        return errors;
    }
    
    private void resetForm() {
        this.nameInput.clear();
        this.firstSurnameInput.clear();
        this.secondSurnameInput.clear();
        this.birthdateInput.getEditor().clear();
        this.birthdateInput.setValue(null);
        this.colorInput.setValue(Color.WHITE);
        this.filenameInput.clear();
        this.interestInput.getSelectionModel().clearSelection();
        this.emailInput.clear();
        this.passwordInput.clear();
        this.urlInput.clear();
        this.hobbiesInput.getCheckModel().clearChecks();
        this.signUpDateInput.getEditor().clear();
        this.signUpDateInput.setValue(null);
    }

    private String getFullName() {
        return String.format(
                "%s %s %s",
                this.nameInput.getText(),
                this.firstSurnameInput.getText(),
                this.secondSurnameInput.getText()
        );
    }
}
