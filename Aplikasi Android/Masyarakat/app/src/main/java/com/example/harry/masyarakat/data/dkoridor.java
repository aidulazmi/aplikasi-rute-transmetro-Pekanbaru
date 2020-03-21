package com.example.harry.masyarakat.data;


public class dkoridor {
    private String id_rute, nama_koridor, Tujuan;

    public dkoridor() {
    }

    public dkoridor(String id_rute, String nama_koridor, String Tujuan) {
        this.id_rute = id_rute;
        this.nama_koridor = nama_koridor;
        this.Tujuan = Tujuan;
    }

    public String getId() {
        return id_rute;
    }

    public void setId(String id_rute) {
        this.id_rute = id_rute;
    }

    public String getNama() {
        return nama_koridor;
    }

    public void setNama(String nama_koridor) {
        this.nama_koridor = nama_koridor;
    }

    public String getTujuan() {
        return Tujuan;
    }

    public void setTujuan(String Tujuan) {
        this.Tujuan = Tujuan;
    }
}
