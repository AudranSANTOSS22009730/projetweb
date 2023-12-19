package StructureDonnee;

class EvaluateExpressionTree {
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
