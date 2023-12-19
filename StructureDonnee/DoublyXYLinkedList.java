package StructureDonnee;

public class DoublyXYLinkedList {
    ListNode head;

    public void insertAtBeginning(int val) {
        ListNode newNode = new ListNode(val);
        newNode.next = head;
        head = newNode;
    }

    public void displayList() {
        ListNode current = head;
        while (current != null) {
            System.out.print(current.val + " ");
            current = current.next;
        }
        System.out.println();
    }

    public void swapNodes(int x, int y) {
        if (x == y) {
            return;
        }

        ListNode prevX = null, currX = head;
        while (currX != null && currX.val != x) {
            prevX = currX;
            currX = currX.next;
        }

        ListNode prevY = null, currY = head;
        while (currY != null && currY.val != y) {
            prevY = currY;
            currY = currY.next;
        }

        if (currX == null || currY == null) {
            return;
        }

        if (prevX != null) {
            prevX.next = currY;
        } else {
            head = currY;
        }

        if (prevY != null) {
            prevY.next = currX;
        } else {
            head = currX;
        }

        ListNode temp = currX.next;
        currX.next = currY.next;
        currY.next = temp;
    }
}
