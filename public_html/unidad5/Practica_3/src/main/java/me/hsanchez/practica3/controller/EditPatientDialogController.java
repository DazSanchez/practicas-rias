/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica3.controller;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import me.hsanchez.practica3.dto.PatientDTO;
import me.hsanchez.practica3.listener.SubmitEventListener;
import me.hsanchez.practica3.listener.Submitable;

/**
 * FXML Controller class
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class EditPatientDialogController implements Initializable, Submitable<PatientDTO> {

    private PatientDTO currentPatient;

    private SubmitEventListener<PatientDTO> submitEventListener;

    @FXML
    private TextField nameInput;

    @FXML
    private TextField firstSurnameInput;

    @FXML
    private TextField secondSurnameInput;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }

    @Override
    public void setSubmitEventListener(SubmitEventListener<PatientDTO> eventListener) {
        submitEventListener = eventListener;
    }

    public void setPatient(PatientDTO patient) {
        currentPatient = patient;
        nameInput.setText(patient.getName());
        firstSurnameInput.setText(patient.getFirstSurname());
        secondSurnameInput.setText(patient.getSecondSurname());
    }

    public void onClose(ActionEvent e) {
        Node node = (Node) e.getSource();
        Stage stage = (Stage) node.getScene().getWindow();
        stage.close();
    }

    public void onSave(ActionEvent e) {
        if(currentPatient == null)
            currentPatient = new PatientDTO();
        
        currentPatient.setName(nameInput.getText().trim());
        currentPatient.setFirstSurname(firstSurnameInput.getText().trim());
        currentPatient.setSecondSurname(secondSurnameInput.getText().trim());
        
        submitEventListener.handle(currentPatient);
    }

}
