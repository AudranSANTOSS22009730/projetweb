package StructureDonneeCollect;

import java.util.HashMap;

public class HashMapOperations {
    public static void main(String[] args) {
        // Création d'un HashMap pour stocker des prénoms avec des âges associés
        HashMap<String, Integer> prenomsAges = new HashMap<>();

        // 1. Ajout de prénoms avec des âges associés
        prenomsAges.put("Mohamed", 25);
        prenomsAges.put("Audran", 30);
        prenomsAges.put("Ugo", 27);
        prenomsAges.put("Mattéo", 22);
        prenomsAges.put("Lyes", 28);

        System.out.println("HashMap de prénoms avec âges : " + prenomsAges);

        String prenomRecherche = "Mattéo";
        if (prenomsAges.containsKey(prenomRecherche)) {
            int age = prenomsAges.get(prenomRecherche);
            System.out.println("L'âge de " + prenomRecherche + " est : " + age + " ans");
        } else {
            System.out.println("Le prénom " + prenomRecherche + " n'est pas présent dans le HashMap.");
        }

        String prenomASupprimer = "Ugo";
        prenomsAges.remove(prenomASupprimer);
        System.out.println("Après suppression de " + prenomASupprimer + " : " + prenomsAges);

        String prenomCherche = "Audran";
        if (prenomsAges.containsKey(prenomCherche)) {
            System.out.println("Le prénom " + prenomCherche + " est présent dans le HashMap.");
        } else {
            System.out.println("Le prénom " + prenomCherche + " n'est pas présent dans le HashMap.");
        }

    }
}
