/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica2.dto;

import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientDTO {

    private int id;
    private StringProperty name;
    private StringProperty firstSurname;
    private StringProperty secondSurname;

    public PatientDTO() {
        this.name = new SimpleStringProperty(this, "name");
        this.firstSurname = new SimpleStringProperty(this, "firstSurname");
        this.secondSurname = new SimpleStringProperty(this, "secondSurname");
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name.get();
    }
    
    public StringProperty getNameProperty() {
        return this.name;
    }

    public void setName(String name) {
        this.name.set(name);
    }

    public String getFirstSurname() {
        return firstSurname.get();
    }
    
    public StringProperty getFirstSurnameProperty() {
        return this.firstSurname;
    }

    public void setFirstSurname(String firstSurname) {
        this.firstSurname.set(firstSurname);
    }

    public String getSecondSurname() {
        return secondSurname.get();
    }
    
    public StringProperty getSecondSurnameProperty() {
        return this.secondSurname;
    }

    public void setSecondSurname(String secondSurname) {
        this.secondSurname.set(secondSurname);
    }

}
