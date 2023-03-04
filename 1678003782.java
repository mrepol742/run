import java.util.ArrayList;
public class ArrayListExample {
    public static void main(String[] args) {
        // Create an ArrayList of Strings
        ArrayList<String> list = new ArrayList<String>();
        // Add some elements
        list.add("Apple");
        list.add("Banana");
        list.add("Orange");
        // Print out the list
        System.out.println("List: " + list);
        // Access an element
        String element = list.get(1);
        System.out.println("Element at index 1: " + element);
        // Remove an element
        list.remove(1);
        System.out.println("List after removing element at index 1: " + list);
        // Check if an element is in the list
        boolean isInList = list.contains("Apple");
        System.out.println("Is Apple in the list? " + isInList);
        // Get the size of the list
        int size = list.size();
        System.out.println("Size of the list: " + size);
    }
}