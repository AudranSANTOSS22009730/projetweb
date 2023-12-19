package StructureDonnee;

public class DoubleMiddleLinkedList {

    public ListNode findMiddle() {
        ListNode head = null;
        if (head == null) {
            return null; 
        }

        ListNode slowPointer = head;
        ListNode fastPointer = head;

        while (fastPointer != null && fastPointer.next != null && fastPointer.next.next != null) {
            slowPointer = slowPointer.next;
            fastPointer = fastPointer.next.next;
        }

        return slowPointer;
    }

}
