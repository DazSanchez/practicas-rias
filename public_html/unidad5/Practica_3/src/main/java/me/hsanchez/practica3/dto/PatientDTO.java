/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica3.dto;

import com.google.gson.annotations.Expose;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientDTO {

    @Expose
    private int id;
    @Expose
    private String name;
    @Expose
    private String firstSurname;
    @Expose
    private String secondSurname;

    private StringProperty nameStringProp;
    private StringProperty firstSurnameStringProp;
    private StringProperty secondSurnameStringProp;

    public PatientDTO() {
        this.nameStringProp = new SimpleStringProperty(this, "name");
        this.firstSurnameStringProp = new SimpleStringProperty(this, "firstSurname");
        this.secondSurnameStringProp = new SimpleStringProperty(this, "secondSurname");
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public StringProperty getNameProperty() {
        return this.nameStringProp;
    }

    public void setName(String name) {
        this.name = name;
        this.nameStringProp.set(name);
    }

    public String getFirstSurname() {
        return firstSurname;
    }

    public StringProperty getFirstSurnameProperty() {
        return this.firstSurnameStringProp;
    }

    public void setFirstSurname(String firstSurname) {
        this.firstSurname = firstSurname;
        this.firstSurnameStringProp.set(firstSurname);
    }

    public String getSecondSurname() {
        return secondSurname;
    }

    public StringProperty getSecondSurnameProperty() {
        return this.secondSurnameStringProp;
    }

    public void setSecondSurname(String secondSurname) {
        this.secondSurname = secondSurname;
        this.secondSurnameStringProp.set(secondSurname);
    }

}
