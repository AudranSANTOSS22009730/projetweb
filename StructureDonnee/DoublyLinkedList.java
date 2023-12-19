package StructureDonnee;

public class DoublyLinkedList {
    static class Node {
        int data;
        Node prev;
        Node next;

        Node(int data) {
            this.data = data;
            this.prev = null;
            this.next = null;
        }
    }

    Node head;
    Node tail;

    DoublyLinkedList() {
        head = new Node(-1);
        tail = new Node(-1);
        head.next = tail;
        tail.prev = head;
    }

    void append(int data) {
        Node newNode = new Node(data);
        Node lastNode = tail.prev;

        lastNode.next = newNode;
        newNode.prev = lastNode;
        newNode.next = tail;
        tail.prev = newNode;
    }

    void concatenate(DoublyLinkedList otherList) {
        Node lastNodeSelf = this.tail.prev;
        Node firstNodeOther = otherList.head.next;

        lastNodeSelf.next = firstNodeOther;
        firstNodeOther.prev = lastNodeSelf;

        this.tail = otherList.tail;
    }

}
