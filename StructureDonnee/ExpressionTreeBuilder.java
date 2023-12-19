package StructureDonnee;

import java.util.*;

public class ExpressionTreeBuilder {
    public static GenericTreeNode<String> buildExpressionTree(String expression) {
        if (expression == null || expression.isEmpty()) {
            return null;
        }

        Stack<GenericTreeNode<String>> stack = new Stack<>();
        String[] tokens = expression.split(" ");

        for (String token : tokens) {
            if (isOperator(token)) {
                GenericTreeNode<String> rightOperand = stack.pop();
                GenericTreeNode<String> leftOperand = stack.pop();

                GenericTreeNode<String> operatorNode = new GenericTreeNode<>(token);
                operatorNode.addChild(leftOperand);
                operatorNode.addChild(rightOperand);

                stack.push(operatorNode);
            } else {
                stack.push(new GenericTreeNode<>(token));
            }
        }

        return stack.pop();
    }

    private static boolean isOperator(String token) {
        return token.equals("+") || token.equals("-") || token.equals("*") || token.equals("/");
    }
}
