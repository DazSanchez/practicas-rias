/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.javafx.practica_1.controller;

import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.ListCell;
import javafx.scene.control.ListView;

/**
 * FXML Controller class
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class ErrorRegisterDialogController implements Initializable {

    @FXML
    private ListView<String> errorList;

    @FXML
    private Button acceptBtn;

    private List<String> errors;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        this.errorList.setItems(FXCollections.observableArrayList(this.errors));
        this.errorList.setCellFactory((p) -> {
            return new ListCell<>() {
                @Override
                protected void updateItem(String item, boolean empty) {
                    super.updateItem(item, empty);
                    if (!empty && item != null) {
                        setMinWidth(p.getPrefWidth());
                        setMaxWidth(p.getPrefWidth());
                        setPrefWidth(p.getPrefWidth());
                        setWrapText(true);
                        setText(item);
                    }
                }
            };
        });

        this.acceptBtn.setOnAction(this::onAccept);
    }

    private void onAccept(ActionEvent e) {
        this.errorList.getScene().getWindow().hide();
    }

    public List<String> getErrors() {
        return errors;
    }

    public void setErrors(List<String> errors) {
        this.errors = errors;
    }

}
