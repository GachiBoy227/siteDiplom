package sample;

import java.net.InetAddress;
import java.util.ArrayList;

public class ScannerLocalCon {
    static int count=0;
    static boolean statusScan=false;
    static ArrayList<LocalCon> ip;
    static LocalCon findServer(){

        if(statusScan==false) {
            statusScan=true;
            ip=new ArrayList<>();
            String localAddress = InterfacesConnect.getLocaladdress().getHostAddress();
            String MainAddress = localAddress.split("\\.")[0] + "." + localAddress.split("\\.")[1] + "." + localAddress.split("\\.")[2] + ".";
            LocalCon[] isReady = {null};
            for (int i = 0; i < 256; i++) {
                final int number = i;
                final Thread thread = new Thread(new Runnable() {
                    @Override
                    public void run() {
                        LocalCon iscon = null;

                        try {
                            iscon = new LocalCon(MainAddress + number);
                            if (iscon.isconnected() ) {
                                ip.add(iscon);
                                isReady[0] = iscon;
                                iscon.client.close();
                            }
                        } catch (Throwable e) {
                            System.out.println("eerrerrerererr");
                        }



                        count++;
                        if (count >= 255) {
                            System.out.println(count);
                            statusScan=false;
                        }
                    }
                });
                  thread.start();

            }
            System.out.println("1111111111111111111111111111111111111111111111111111111111111111111111111111");
            while (statusScan==true&&count<255){

            }

            count=0;
            System.out.println("22222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222");
            return isReady[0];              //вернём null если ничего не нашли
        }
        return null;
    }
}
