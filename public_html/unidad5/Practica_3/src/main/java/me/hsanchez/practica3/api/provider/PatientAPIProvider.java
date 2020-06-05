/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica3.api.provider;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import me.hsanchez.practica3.api.PatientAPI;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientAPIProvider {

    private static Retrofit retrofit;

    static {
        Gson gson = new GsonBuilder().excludeFieldsWithoutExposeAnnotation().create();

        retrofit = new Retrofit.Builder()
                .baseUrl("http://localhost/controladores/")
                .addConverterFactory(GsonConverterFactory.create(gson))
                .build();
    }

    public static PatientAPI getPatientAPI() {
        return retrofit.create(PatientAPI.class);
    }
}
