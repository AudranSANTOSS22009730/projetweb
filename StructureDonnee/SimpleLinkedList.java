package StructureDonnee;

public class SimpleLinkedList {
    ListNode head;

    // Méthode pour insérer un élément au début de la liste
    public void insertAtBeginning(int val) {
        ListNode newNode = new ListNode(val);
        newNode.next = head;
        head = newNode;
    }

    public ListNode findSecondLastNode() {
        if (head == null || head.next == null) {
            return null;
        }

        ListNode current = head;
        while (current.next.next != null) {
            current = current.next;
        }
        return current;
    }

    public void displayList() {
        ListNode current = head;
        while (current != null) {
            System.out.print(current.val + " ");
            current = current.next;
        }
        System.out.println();
    }
}
