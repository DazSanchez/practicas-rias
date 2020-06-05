/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica3.service;

import java.io.IOException;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import me.hsanchez.practica3.api.provider.PatientAPIProvider;
import me.hsanchez.practica3.dto.PatientDTO;
import me.hsanchez.practica3.dto.PayloadWithIdDTO;
import me.hsanchez.practica3.dto.SuccessResponseDTO;
import me.hsanchez.practica3.exception.QueryExecutionException;
import retrofit2.Call;
import retrofit2.Response;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientsService {

    public List<PatientDTO> getPatients() throws QueryExecutionException {
        try {
            Call<List<PatientDTO>> request = PatientAPIProvider.getPatientAPI().getPatients();
            Response<List<PatientDTO>> response = request.execute();
            return response.body();
        } catch (IOException ex) {
            throw new QueryExecutionException("Ha ocurrido un error en la peticion: " + ex.getMessage());
        }
    }

    public void createPatient(PatientDTO patient) throws QueryExecutionException {
        Call<PayloadWithIdDTO> request = PatientAPIProvider.getPatientAPI().createPatient(patient);

        try {
            request.execute();
        } catch (IOException ex) {
            throw new QueryExecutionException("Ha ocurrido un error en la peticion: " + ex.getMessage());
        }
    }

    public void editPatient(PatientDTO patient) throws QueryExecutionException {
        Call<SuccessResponseDTO> request = PatientAPIProvider.getPatientAPI().updatePatient(patient);
        
        try {
            request.execute();
        } catch (IOException ex) {
            throw new QueryExecutionException("Ha ocurrido un error en la peticion: " + ex.getMessage());
        }
    }

    public void deletePatient(PatientDTO patient) throws QueryExecutionException {
        PayloadWithIdDTO payload = new PayloadWithIdDTO();
        payload.setId(patient.getId());
        
        Call<SuccessResponseDTO> request = PatientAPIProvider.getPatientAPI().deletePatient(payload);
        
        try {
            request.execute();
        } catch (IOException ex) {
            throw new QueryExecutionException("Ha ocurrido un error en la peticion: " + ex.getMessage());
        }
    }

}
