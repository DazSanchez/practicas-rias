package me.hsanchez.practica3.controller;

import java.io.IOException;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TableCell;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableRow;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Modality;
import javafx.stage.Stage;
import me.hsanchez.practica3.App;
import me.hsanchez.practica3.dto.PatientDTO;
import me.hsanchez.practica3.exception.QueryExecutionException;
import me.hsanchez.practica3.service.PatientsService;

public class PatientsListController implements Initializable {

    @FXML
    private TableView<PatientDTO> patientsTable;

    private final PatientsService patientsService;

    public PatientsListController() {
        this.patientsService = new PatientsService();
    }

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        this.setupTable();
        this.fetchPatients();
    }

    private void setupTable() {
        this.patientsTable.setRowFactory(tv -> {
            TableRow<PatientDTO> row = new TableRow<>();
            row.setOnMouseClicked(ev -> {
                if (ev.getClickCount() == 2 && !row.isEmpty()) {
                    this.onRowClicked(row.getItem());
                }
            });

            return row;
        });

        TableColumn<PatientDTO, String> nameColumn = new TableColumn<>("Nombre");
        nameColumn.setCellValueFactory(new PropertyValueFactory<>("name"));

        TableColumn<PatientDTO, String> firstSurnameColumn = new TableColumn<>("A. Paterno");
        firstSurnameColumn.setCellValueFactory(new PropertyValueFactory<>("firstSurname"));

        TableColumn<PatientDTO, String> secondSurnameColumn = new TableColumn<>("A. Materno");
        secondSurnameColumn.setCellValueFactory(new PropertyValueFactory<>("secondSurname"));

        TableColumn<PatientDTO, Node> actionColumn = new TableColumn("Acciones");
        actionColumn.setCellFactory((TableColumn<PatientDTO, Node> p) -> {
            final TableCell<PatientDTO, Node> tableCell = new TableCell<PatientDTO, Node>() {
                final Button button = new Button("Eliminar");

                @Override
                protected void updateItem(Node item, boolean empty) {
                    super.updateItem(item, empty);
                    if (empty) {
                        setGraphic(null);
                        setText(null);
                    } else {
                        button.setOnAction(e -> {
                            PatientDTO p = getTableView().getItems().get(getIndex());
                            deletePatient(p);
                        });

                        setGraphic(button);
                        setText(null);
                    }
                }
            };

            return tableCell;
        });

        this.patientsTable.getColumns().setAll(nameColumn, firstSurnameColumn, secondSurnameColumn, actionColumn);
    }

    private void fetchPatients() {
        try {
            List<PatientDTO> patients = this.patientsService.getPatients();
            ObservableList<PatientDTO> observableList = FXCollections.observableList(patients);
            this.patientsTable.setItems(observableList);
        } catch (QueryExecutionException ex) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error obteniendo los datos");
            alert.setHeaderText(null);
            alert.setContentText(ex.getMessage());
            alert.show();
        }
    }

    private void onRowClicked(PatientDTO patient) {
        try {
            FXMLLoader loader = new FXMLLoader(App.class.getResource("views/edit_patient_dialog.fxml"));
            Parent parent = loader.load();
            Stage stage = new Stage();

            EditPatientDialogController controller = loader.<EditPatientDialogController>getController();
            controller.setPatient(patient);
            controller.setSubmitEventListener(p -> {
                saveEditPatient(p);
                stage.close();
            });

            stage.initModality(Modality.APPLICATION_MODAL);
            stage.setScene(new Scene(parent));
            stage.setResizable(false);
            stage.showAndWait();
        } catch (IOException ex) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error abriendo formulario");
            alert.setHeaderText(null);
            alert.setContentText(ex.getMessage());
            alert.show();
        }
    }

    private void saveEditPatient(PatientDTO patient) {
        try {
            this.patientsService.editPatient(patient);
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Información actualizada");
            alert.setHeaderText(null);
            alert.setContentText("Se ha actualizado la información del paciente");
            alert.show();

            this.fetchPatients();
        } catch (QueryExecutionException ex) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error actualizando información");
            alert.setHeaderText(null);
            alert.setContentText(ex.getMessage());
            alert.show();
        }
    }
    
    private void deletePatient(PatientDTO patient) {
        try {
            this.patientsService.deletePatient(patient);
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Paciente eliminado");
            alert.setHeaderText(null);
            alert.setContentText("Se ha eliminado al paciente");
            alert.show();

            this.fetchPatients();
        } catch (QueryExecutionException ex) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error eliminando al paciente");
            alert.setHeaderText(null);
            alert.setContentText(ex.getMessage());
            alert.show();
        }
    }
    
    public void onCreate() {
        try {
            FXMLLoader loader = new FXMLLoader(App.class.getResource("views/edit_patient_dialog.fxml"));
            Parent parent = loader.load();
            Stage stage = new Stage();

            EditPatientDialogController controller = loader.<EditPatientDialogController>getController();
            controller.setSubmitEventListener(p -> {
                createPatient(p);
                stage.close();
            });

            stage.initModality(Modality.APPLICATION_MODAL);
            stage.setScene(new Scene(parent));
            stage.setResizable(false);
            stage.showAndWait();
        } catch (IOException ex) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error abriendo formulario");
            alert.setHeaderText(null);
            alert.setContentText(ex.getMessage());
            alert.show();
        }
    }
    
    private void createPatient(PatientDTO patient) {
        try {
            this.patientsService.createPatient(patient);
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Paciente creado");
            alert.setHeaderText(null);
            alert.setContentText("Se ha creado al paciente");
            alert.show();
            
            fetchPatients();
        } catch (QueryExecutionException ex) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error creando al paciente");
            alert.setHeaderText(null);
            alert.setContentText(ex.getMessage());
            alert.show();
        }
    }

}
