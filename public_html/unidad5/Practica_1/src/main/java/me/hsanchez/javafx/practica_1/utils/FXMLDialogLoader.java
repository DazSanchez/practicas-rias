/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.javafx.practica_1.utils;

import java.io.IOException;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.stage.Window;
import me.hsanchez.javafx.practica_1.App;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class FXMLDialogLoader {
    public static FXMLLoader getLoaderFor(String fxml, Object controller) throws IOException {
        FXMLLoader loader = App.getLoaderFor(fxml);
        loader.setController(controller);
        return loader;
    }
    
    public static Stage createStage(Scene scene, Window owner) {
        Stage stage = new Stage();
        stage.initModality(Modality.WINDOW_MODAL);
        stage.initStyle(StageStyle.UTILITY);
        stage.initOwner(owner);
        stage.setScene(scene);
        stage.setResizable(false);
        
        return stage;
    }
}
