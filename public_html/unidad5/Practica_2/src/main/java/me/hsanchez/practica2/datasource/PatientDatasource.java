/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica2.datasource;

import com.mysql.cj.jdbc.MysqlDataSource;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class PatientDatasource {
    private static final MysqlDataSource DATA_SOURCE;
    
    static {
        DATA_SOURCE = new MysqlDataSource();
        DATA_SOURCE.setUrl("jdbc:mysql://localhost:3306/hospital_db?useSSL=false&allowPublicKeyRetrieval=true");
        DATA_SOURCE.setUser("root");
        DATA_SOURCE.setPassword("toor");
    }
    
    public static MysqlDataSource getDatasource() {
        return DATA_SOURCE;
    }
}
