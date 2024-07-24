package sample;

import java.net.InetAddress;
import java.net.NetworkInterface;
import java.net.SocketException;
import java.util.ArrayList;
import java.util.Enumeration;

public class InterfacesConnect {
    static private ArrayList<InetAddress>addresses=null;
    static private InetAddress localaddress=null;
    static public void search() throws SocketException {
        InterfacesConnect.addresses=new ArrayList<>();
        Enumeration<NetworkInterface> getnetI=NetworkInterface.getNetworkInterfaces();
        while (getnetI.hasMoreElements()){
            NetworkInterface networkInterface=getnetI.nextElement();
            Enumeration<InetAddress> addresses = networkInterface.getInetAddresses();
            while(addresses.hasMoreElements()){
                InetAddress address=addresses.nextElement();
                    if (address.getHostAddress().split("\\.").length == 4&&networkInterface.getName().split("wlan").length>1) {
                        localaddress=address;
                        System.out.println(networkInterface.getName());
                            InterfacesConnect.addresses.add(address);
                    }
            }
        }
    }
    static ArrayList<InetAddress> getAddresses(){
        if(InterfacesConnect.addresses==null) {
            try {
                System.out.println("ggvp");
                search();
            }catch (Exception e){

            }
        }
        return InterfacesConnect.addresses;
    }
    static InetAddress getLocaladdress(){
        if(InterfacesConnect.localaddress==null) {
            try {
                System.out.println("ggvp");
                search();
            }catch (Exception e){

            }
        }
        return InterfacesConnect.localaddress;
    }
}
