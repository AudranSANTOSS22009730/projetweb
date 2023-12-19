package StructureDonnee;

import java.util.*;

public class GenericTreeNode<T> {
    T data;
    List<GenericTreeNode<T>> children;

    public GenericTreeNode(T data) {
        this.data = data;
        this.children = new ArrayList<>();
    }

    public void addChild(GenericTreeNode<T> child) {
        children.add(child);
    }

    public void preorderTraversal() {
        System.out.print(data + " ");
        for (GenericTreeNode<T> child : children) {
            child.preorderTraversal();
        }
    }

    public void inorderTraversal() {
        for (GenericTreeNode<T> child : children) {
            child.inorderTraversal();
            System.out.print(data + " ");
        }
    }

    public void postorderTraversal() {
        for (GenericTreeNode<T> child : children) {
            child.postorderTraversal();
        }
        System.out.print(data + " ");
    }

    public static double evaluateExpressionTree(GenericTreeNode<String> root) {
        if (root == null) {
            return 0;
        }

        if (root.children.isEmpty()) {
            return Double.parseDouble(root.data);
        }

        double left = evaluateExpressionTree(root.children.get(0));
        double right = evaluateExpressionTree(root.children.get(1));

        switch (root.data) {
            case "+":
                return left + right;
            case "-":
                return left - right;
            case "*":
                return left * right;
            case "/":
                if (right != 0) {
                    return left / right;
                } else {
                    throw new ArithmeticException("Division by zero error!");
                }
            default:
                return 0;
        }
    }
}
