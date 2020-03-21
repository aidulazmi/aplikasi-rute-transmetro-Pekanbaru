package com.example.harry.masyarakat.module;

public class Jarak {

    private String nama_halte, jarak, foto;

    public Jarak() {
    }

    public Jarak(String nama_halte, String jarak, String foto) {
        this.nama_halte = nama_halte;
        this.jarak = jarak;
        this.foto = foto;
    }

    public String getNama() {
        return nama_halte;
    }

    public void setNama(String nama_halte) {
        this.nama_halte = nama_halte;
    }

    public String getJarak() {
        return jarak;
    }

    public void setJarak(String jarak) {
        this.jarak = jarak;
    }

    public String getGambar() {
        return foto;
    }

    public void setGambar(String foto) {
        this.foto = foto;
    }

}
