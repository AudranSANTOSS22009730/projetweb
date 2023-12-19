package StructureDonnee;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

class ListNodeTest {
    @Test
    public void testCreateRecursiveList() {
        // Création d'une liste simplement chaînée de manière récursive
        ListNode.SimpleLinkedList list = new ListNode.SimpleLinkedList();
        int[] elements = {1, 2, 3, 4, 5};
        ListNode head = list.createRecursiveList(elements, 0);

        // Vérification de la validité de la liste créée
        assertNotNull(head);
        int index = 0;
        while (head != null) {
            assertEquals(elements[index], head.val);
            head = head.next;
            index++;
        }
    }

    // Ajoutez d'autres méthodes de test pour d'autres fonctionnalités


}