/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica2.dao.queries;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientsQueries {

    public static final String GET_PATIENTS = "SELECT ID id, NAME name, FIRST_SURNAME firstSurname, SECOND_SURNAME secondSurname FROM PATIENTS";
    public static final String CREATE_PATIENT = "INSERT INTO PATIENTS(NAME, FIRST_SURNAME, SECOND_SURNAME) VALUES (?,?,?)";
    public static final String EDIT_PATIENT_BY_ID = "UPDATE PATIENTS SET NAME = ?, FIRST_SURNAME = ?, SECOND_SURNAME = ? WHERE ID = ?";
    public static final String DELETE_PATIENT_BY_ID = "DELETE FROM PATIENTS WHERE ID = ?";
}
