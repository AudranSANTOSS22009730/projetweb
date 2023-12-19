package StructureDonnee;

public class ReverseLinkedList {
    ListNode reverseList(ListNode head) {
        ListNode previous = null;
        ListNode current = head;
        ListNode nextNode;

        while (current != null) {
            nextNode = current.next;
            current.next = previous;
            previous = current;
            current = nextNode;
        }
        return previous;
    }
}
