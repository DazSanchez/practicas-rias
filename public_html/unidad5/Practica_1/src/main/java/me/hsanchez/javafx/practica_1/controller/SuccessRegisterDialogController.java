/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.javafx.practica_1.controller;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;

/**
 * FXML Controller class
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class SuccessRegisterDialogController implements Initializable {

    @FXML
    private Label messageLabel;
    
    @FXML
    private Button acceptBtn;
    
    private String user;
    
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        String template = this.messageLabel.getText();
        this.messageLabel.setText(template.replace("${user}", this.user));
        
        this.acceptBtn.setOnAction(this::onAccept);
    }
    
    private void onAccept(ActionEvent e) {
        this.messageLabel.getScene().getWindow().hide();
    }
    
    public String getUser() {
        return user;
    }

    public void setUser(String user) {
        this.user = user;
    }
}
