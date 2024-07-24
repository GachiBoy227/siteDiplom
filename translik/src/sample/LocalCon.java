package sample;

import java.net.InetAddress;
import java.net.InetSocketAddress;
import java.net.Socket;
import java.net.SocketAddress;

public class LocalCon{
    int port=3447;
    InetAddress ip;
    Socket client;
    LocalCon(String ip,int port){
        try {
            this.ip = InetAddress.getByName(ip);
            this.port = port;
            client = new Socket(ip,port);
        }catch (Exception e){
            System.out.println("NO connected");
        }
    }
    LocalCon(String ip){
        try {
            this.ip = InetAddress.getByName(ip);
            SocketAddress socketAddress=new InetSocketAddress(ip,port);
            client = new Socket();
            client.connect(socketAddress,10000);
        }catch (Exception e){
            System.out.println("NO connected");
        }
    }
   public boolean isconnected(){
        return client.isConnected();
    }


}
