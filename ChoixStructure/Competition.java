package ChoixStructure;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.TreeSet;

public class Competition {
    public static void main(String[] args) {
        ArrayList<Amateur> amateurs = new ArrayList<>();
        TreeSet<Competiteur> classementCompetiteurs = new TreeSet<>(Comparator.comparingInt(Competiteur::getScore).reversed());

        amateurs.add(new Amateur("Audran", 50));
        amateurs.add(new Amateur("Mohamed", 30));
        amateurs.add(new Amateur("Lyes", 45));

        System.out.println("Amateurs : ");
        for (Amateur amateur : amateurs) {
            System.out.println(amateur);
        }

        // Création de 2 compétiteurs et ajout au classement
        classementCompetiteurs.add(new Competiteur("Rayane", 80));
        classementCompetiteurs.add(new Competiteur("Maxime", 65));

        System.out.println("\nClassement des compétiteurs : ");
        for (Competiteur competiteur : classementCompetiteurs) {
            System.out.println(competiteur);
        }
    }
}

class Participant {
    private String nom;
    private int score;

    public Participant(String nom, int score) {
        this.nom = nom;
        this.score = score;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public int getScore() {
        return score;
    }

    public void setScore(int score) {
        this.score = score;
    }

    @Override
    public String toString() {
        return "Participant{" +
                "nom='" + nom + '\'' +
                ", score=" + score +
                '}';
    }
}

class Amateur extends Participant {
    public Amateur(String nom, int score) {
        super(nom, score);
    }
}

class Competiteur extends Participant {
    private static TreeSet<Competiteur> classementCompetiteurs = new TreeSet<>(Comparator.comparingInt(Competiteur::getScore).reversed());

    public Competiteur(String nom, int score) {
        super(nom, score);
        classementCompetiteurs.add(this);
    }

    public static TreeSet<Competiteur> getClassementCompetiteurs() {
        return classementCompetiteurs;
    }
}
