/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica2.service;

import java.util.List;
import me.hsanchez.practica2.dao.PatientDAO;
import me.hsanchez.practica2.dto.PatientDTO;
import me.hsanchez.practica2.exception.QueryExecutionException;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientsService {
    
    private final PatientDAO patientDAO;

    public PatientsService() {
        this.patientDAO = new PatientDAO();
    }
    
    public List<PatientDTO> getPatients() throws QueryExecutionException {
        return this.patientDAO.getPatients();
    }
    
    public void createPatient(PatientDTO patient) throws QueryExecutionException {
        this.patientDAO.createPatient(patient);
    }
    
    public void editPatient(PatientDTO patient) throws QueryExecutionException {
        this.patientDAO.editPatient(patient);
    }
    
    public void deletePatient(PatientDTO patient) throws QueryExecutionException {
        this.patientDAO.deletePatient(patient.getId());
    }
    
}
