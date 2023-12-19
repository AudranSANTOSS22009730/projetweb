package StructureDonnee;

public class CircularLinkedList {
    ListNode head;

    // Méthode pour compter le nombre de nœuds dans une liste circulaire
    public int countNodesInCircularList() {
        if (head == null) {
            return 0;
        }

        int count = 1;
        ListNode current = head.next;

        while (current != head) {
            count++;
            current = current.next;
        }

        return count;
    }

}