package sample;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.net.*;
import java.security.cert.X509Certificate;
import java.sql.*;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.ResourceBundle;

import javafx.animation.TranslateTransition;
import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.scene.Cursor;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.AnchorPane;
import javafx.scene.paint.Color;
import javafx.scene.paint.Paint;


import javax.swing.*;


public class Controller implements ActionListener {
    @FXML
    private ResourceBundle resources;

    @FXML
    private URL location;
    private boolean isScanning=false;
    @FXML
    private Button close;
    @FXML
    private Button svernut;
    @FXML
    private Label slong;
    @FXML
    private AnchorPane drag;

    @FXML
    private ImageView icon;

    @FXML
    private Button input;

    @FXML
    private TextField login;

    @FXML
    private PasswordField password;

    @FXML
    private Label status;
    @FXML
    private Label textPass;


    @FXML
    private Label textLogin;

    private double posXclickMouse=0;
    private double posYclickMouse=0;
    private Timer animations=new Timer(10,this);
    private boolean colorssweatch=true;

    LocalCon host;
    BtnAnim animclose;
    BtnAnim animInpt;
    BtnAnim animSvernut;
    int[] rgb={255,0,0};
    int millis=0;
    int countcolor=0;
    @FXML
    void initialize() {

        textPass.setOpacity(0.5);
        textLogin.setOpacity(0.5);
        animclose=new BtnAnim(close,0.5,0.25);
        animInpt=new BtnAnim(input,0.5,0.05);
        animSvernut=new BtnAnim(svernut,0.5,0.05);
        input.setOnAction(e->{
            System.out.println(isScanning);
            if(isScanning){
                host=ScannerLocalCon.ip.get(0);
            }
            Desktop desktop=Desktop.getDesktop();
            try {
                desktop.browse(new URI("http://"+host.ip.getHostAddress()+"?login="+login.getText()+"&&password="+password.getText()));
            }catch (Exception y){
            }
        });
        try {
            icon.setImage(new Image(getClass().getResourceAsStream("icon.png")));
        }catch (Exception e){

        }
        close.setOnAction(e->{

                    System.exit(0);


        });
        svernut.setOnAction(e->{
            Main.window.setIconified(true);
                });
        drag.setOnMousePressed(e->{
            posXclickMouse=e.getSceneX();
            posYclickMouse=e.getSceneY();
            Main.window.getScene().setCursor(Cursor.CLOSED_HAND);
        });
        drag.setOnMouseReleased(e->{
            Main.window.getScene().setCursor(Cursor.OPEN_HAND);
        });
        drag.setOnMouseDragged(e->{
                Main.window.setX(e.getScreenX() - posXclickMouse);
            Main.window.setY(e.getScreenY() - posYclickMouse);
        });
         drag.setOnMouseEntered(e->{
        Main.window.getScene().setCursor(Cursor.OPEN_HAND);
        });
        drag.setOnMouseExited(e->{
            Main.window.getScene().setCursor(Cursor.DEFAULT);
        });
        animations.start();
        //НАчалось самое пекло
        //isScanning=false or true.В начале проверяем подключение к Бд если это сервер
        settingmysql();
        try {
            DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/sites", "root", "kilsnart");
            host=new LocalCon(InterfacesConnect.getLocaladdress().getHostAddress());
            if(host.isconnected()){
                throw new Exception("host is on");
            }
            createserver();
        }
        catch (Exception e){

            isScanning=true;
            scanning();



        }



    }
public void animationhover(TextField inp,Label label){
    if(!inp.isFocused()){
        label.setOpacity((label.getOpacity()<=0.5)?0.5:label.getOpacity()-0.02);
    }else{
        label.setOpacity((label.getOpacity()>1)?1:label.getOpacity()+0.02);
    }
}
    @Override
    public void actionPerformed(ActionEvent e) {
        Platform.runLater(new Runnable() {
            @Override
            public void run() {
                animclose.animationing();
                animInpt.animationing();
                animSvernut.animationing();
                if(millis>3) {
                    animatincolors();
                    slong.setTextFill(Color.rgb(rgb[0],rgb[1],rgb[2]));
                    millis=0;
                }
                millis++;
                animationhover(login,textLogin);
                animationhover(password,textPass);

                Rulescann();

            }
        });

    }
public void animatincolors(){
if(colorssweatch){
    rgb[(countcolor+1>=3)?0:countcolor+1]+=5;
    if(rgb[countcolor]==255&&rgb[(countcolor+1>=3)?0:countcolor+1]==255){
        colorssweatch=false;
    }
}else{
    rgb[countcolor]-=5;
    rgb[(countcolor+1>=3)?0:countcolor+1]=(rgb[(countcolor+1>=3)?0:countcolor+1]>=255)?255:rgb[(countcolor+1>=3)?0:countcolor+1]+5;
    if(rgb[countcolor]==0){
        colorssweatch=true;
        countcolor=(countcolor+1>=3)?0:countcolor+1;
    }
}

}
public void createserver(){
        Thread thread=new Thread(new Runnable() {
            @Override
            public void run() {
                ArrayList<Socket> clients = new ArrayList<Socket>();
                try {
                    ServerSocket serverSocket = new ServerSocket(3447, 100, InterfacesConnect.getLocaladdress());
                    while (!serverSocket.isClosed()) {

                        clients.add(serverSocket.accept());
                        System.out.println("Connected:" + clients.size());
                        clients.get(clients.size()-1).close();
                    }
                }
                catch(Exception e){

                }
            }
        });
 thread.start();
}


    public void scanning(){
        if(isScanning){
            Thread start=new Thread(new Runnable() {
                @Override
                public void run() {
                  ScannerLocalCon.findServer();
                }
            });
            start.start();
        }
    }
    public void Rulescann() {
        if (isScanning) {
            if (ScannerLocalCon.ip!=null&&ScannerLocalCon.ip.size() >= 1) {
                Platform.runLater(new Runnable() {
                    @Override
                    public void run() {
                        status.setText("Подключено");
                        drag.setStyle("-fx-background-color:darkgreen");
                    }
                });

            } else {
                Platform.runLater(new Runnable() {
                    @Override
                    public void run() {
                        status.setText("Ошибка|Не видит сервер");
                        drag.setStyle("-fx-background-color:darkred");
                    }
                });
            }
        }else{
            Platform.runLater(new Runnable() {
                @Override
                public void run() {
                    status.setText("локальный прокси создан");
                    drag.setStyle("-fx-background-color:darkblue");
                }
            });
        }
    }

    private void settingmysql(){
        try{
                Connection connection=DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/", "root", "");
            Statement sql=connection.createStatement();
            System.out.println("DATABASE");
            sql.execute("CREATE DATABASE sites");
            System.out.println("DATABASE");
            sql.execute("ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'kilsnart'");
            connection.close();
            connection=DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/sites", "root", "kilsnart");
            sql=connection.createStatement();
            sql.execute( "CREATE TABLE `results` (\n" +
                            "  `id` SERIAL PRIMARY KEY,\n" +
                            "  `name_uchenik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                            "  `id_zadanie` bigint NOT NULL,\n" +
                            "  `file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                            "  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                            "  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP\n"+
                            ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

            sql.execute( "CREATE TABLE `users` (\n" +
                    "  `id` SERIAL PRIMARY KEY,\n" +
                    "  `login` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                    "  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                    "  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                    "  `family` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                    "  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                    "  `father` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                    "  `gruppa` int NOT NULL\n" +
                    ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n");

           sql.execute("CREATE TABLE `zadanie` (\n" +
                   "  `id` SERIAL PRIMARY KEY,\n" +
                   "  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                   "  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                   "  `gruppa` int NOT NULL,\n" +
                   "  `file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,\n" +
                   "  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP\n" +
                   ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n");
           sql.execute("CREATE TABLE `sites`.`estimations` (`id` SERIAL NOT NULL , `estimation` INT NOT NULL , `name` TEXT NOT NULL ,`id_zadanie` bigint NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;");//нужно проверить

            connection.close();
        }catch (SQLException e){

        }
    }
}
