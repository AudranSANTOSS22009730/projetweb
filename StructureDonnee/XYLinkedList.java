package StructureDonnee;

public class XYLinkedList {
    static class Node {
        int data;
        Node next;

        Node(int data) {
            this.data = data;
            this.next = null;
        }
    }

    Node head;

    XYLinkedList() {
        head = null;
    }
    void exchangeNodes(Node x, Node y) {
        if (x == y) return;

        Node prevX = null, currX = head;
        while (currX != null && currX != x) {
            prevX = currX;
            currX = currX.next;
        }

        Node prevY = null, currY = head;
        while (currY != null && currY != y) {
            prevY = currY;
            currY = currY.next;
        }

        if (currX == null || currY == null) {
            System.out.println("x ou y n'est pas présent dans la liste.");
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

        Node temp = currY.next;
        currY.next = currX.next;
        currX.next = temp;
    }

}
