package StructureDonneeCollect;

import java.util.ArrayList;
import java.util.Collections;

public class ArrayListOperations {
    public static void main(String[] args) {
        ArrayList<String> prenoms = new ArrayList<>();
        prenoms.add("Mohamed");
        prenoms.add("Audran");
        prenoms.add("Ugo");
        prenoms.add("Mattéo");
        prenoms.add("Lyes");
        System.out.println("ArrayList de prénoms : " + prenoms);

        System.out.println("Parcours de l'ArrayList :");
        for (String prenom : prenoms) {
            System.out.println(prenom);
        }

        prenoms.add(0, "Alice");
        System.out.println("Après insertion en 1ère position : " + prenoms);

        System.out.println("Élément à l'index 2 : " + prenoms.get(2));

        prenoms.set(3, "Lucas");
        System.out.println("Après mise à jour : " + prenoms);

        prenoms.remove(2);
        System.out.println("Après suppression du 3ème élément : " + prenoms);

        if (prenoms.contains("Audran")) {
            System.out.println("L'élément 'Audran' est présent dans la liste.");
        } else {
            System.out.println("L'élément 'Audran' n'est pas présent dans la liste.");
        }

        Collections.sort(prenoms);
        System.out.println("Après tri : " + prenoms);

        ArrayList<String> copiedPrenoms = new ArrayList<>(prenoms);
        System.out.println("Copie de l'ArrayList : " + copiedPrenoms);

        System.out.println("Affichage par position :");
        for (int i = 0; i < prenoms.size(); i++) {
            System.out.println("Index " + i + " : " + prenoms.get(i));
        }
    }
}
