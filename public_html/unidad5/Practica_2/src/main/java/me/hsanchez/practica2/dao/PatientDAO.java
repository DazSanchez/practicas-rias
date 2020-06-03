/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica2.dao;

import java.sql.SQLException;
import java.util.List;
import me.hsanchez.practica2.dao.queries.PatientsQueries;
import me.hsanchez.practica2.datasource.PatientDatasource;
import me.hsanchez.practica2.dto.PatientDTO;
import me.hsanchez.practica2.exception.QueryExecutionException;
import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.handlers.BeanListHandler;
import org.apache.commons.dbutils.handlers.ScalarHandler;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientDAO {

    public List<PatientDTO> getPatients() throws QueryExecutionException {
        QueryRunner qr = new QueryRunner(PatientDatasource.getDatasource());

        try {
            List<PatientDTO> patients = qr.query(PatientsQueries.GET_PATIENTS, new BeanListHandler<>(PatientDTO.class));

            return patients;
        } catch (SQLException ex) {
            throw new QueryExecutionException("Ha ocurrido un error: " + ex.getMessage());
        }
    }

    public void createPatient(PatientDTO patient) throws QueryExecutionException {
        QueryRunner qr = new QueryRunner(PatientDatasource.getDatasource());

        try {
            qr.insert(PatientsQueries.CREATE_PATIENT, new ScalarHandler<Long>(), patient.getName(), patient.getFirstSurname(), patient.getSecondSurname());
            
        } catch (SQLException ex) {
            throw new QueryExecutionException("Ha ocurrido un error: " + ex.getMessage());
        }
    }
    
    public void editPatient(PatientDTO patient) throws QueryExecutionException {
        QueryRunner qr = new QueryRunner(PatientDatasource.getDatasource());
        
        try {
            int updated = qr.update(PatientsQueries.EDIT_PATIENT_BY_ID, patient.getName(), patient.getFirstSurname(), patient.getSecondSurname(), patient.getId());
            
            if(updated == 0)
                throw new SQLException("No se pudo actualizar el registro");
            
        } catch (SQLException ex) {
            throw new QueryExecutionException("Ha ocurrido un error: " + ex.getMessage());
        }
    }
    
    public void deletePatient(int id) throws QueryExecutionException {
        QueryRunner qr = new QueryRunner(PatientDatasource.getDatasource());
        
        try {
            int updated = qr.update(PatientsQueries.DELETE_PATIENT_BY_ID, id);
            
            if(updated == 0)
                throw new SQLException("No se pudo borrar el registro");
            
        } catch (SQLException ex) {
            throw new QueryExecutionException("Ha ocurrido un error: " + ex.getMessage());
        }
    }
}
