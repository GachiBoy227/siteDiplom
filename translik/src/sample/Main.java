package sample;

import javafx.animation.KeyFrame;
import javafx.animation.Timeline;
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.paint.Color;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.util.Duration;

import java.util.Arrays;

public class Main extends Application {
static Stage window;
static Scene scene;
    @Override
    public void start(Stage primaryStage) throws Exception{
      //поиск интерфейсов подключения
        System.out.println(Arrays.toString(InterfacesConnect.getAddresses().toArray())+"Main adress -|>"+InterfacesConnect.getLocaladdress());
        Parent root = FXMLLoader.load(getClass().getResource("sample.fxml"));
        primaryStage.setTitle("Translik");
        scene=new Scene(root, 800, 600, Color.TRANSPARENT);
        primaryStage.setScene(scene);
        primaryStage.initStyle(StageStyle.TRANSPARENT);
        window=primaryStage;
        primaryStage.show();
    }


    public static void main(String[] args) {
        launch(args);
    }
}
