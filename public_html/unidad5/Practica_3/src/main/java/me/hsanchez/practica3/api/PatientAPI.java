/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica3.api;

import java.util.List;
import me.hsanchez.practica3.dto.PayloadWithIdDTO;
import me.hsanchez.practica3.dto.PatientDTO;
import me.hsanchez.practica3.dto.SuccessResponseDTO;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.PUT;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public interface PatientAPI {

    @GET("obtener_pacientes.php")
    Call<List<PatientDTO>> getPatients();

    @POST("crear_paciente.php")
    Call<PayloadWithIdDTO> createPatient(@Body PatientDTO patient);

    @PUT("modificar_paciente.php")
    Call<SuccessResponseDTO> updatePatient(@Body PatientDTO patient);

    @POST("eliminar_paciente.php")
    Call<SuccessResponseDTO> deletePatient(@Body PayloadWithIdDTO payload);
}
