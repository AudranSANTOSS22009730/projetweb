package StructureDonnee;

public class ListNode {
    int val;
    ListNode next;

    public ListNode(int val) {
        this.val = val;
        this.next = null;
    }

    public static class SimpleLinkedList {
        ListNode head;

        public ListNode createRecursiveList(int[] elements, int index) {
            if (index == elements.length) {
                return null;
            }
            ListNode newNode = new ListNode(elements[index]);
            newNode.next = createRecursiveList(elements, index + 1);
            return newNode;
        }

    }

}