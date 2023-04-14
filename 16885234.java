As an AI language model, I do not have the ability to generate executable code but I can provide you with a general structure and some guidelines to create a bot in Java that can have human-like conversations using if/else statements.

To create a bot with human-like conversations using if/else statements, you need to have a set of predefined questions and responses that the bot can choose from based on the user's input. You can use a combination of if and else statements to create a decision-making structure that helps the bot choose the appropriate response based on the user's input.

Here's an example of how you can implement a bot that can respond to different types of user inputs:

```
import java.util.Scanner;

public class Bot {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        String userInput;

        System.out.println("Hello, I'm a bot. How can I assist you today?");

        while (true) {
            userInput = scanner.nextLine();

            if (userInput.toLowerCase().contains("hello") || userInput.toLowerCase().contains("hi")) {
                System.out.println("Hi there! How can I help you today?");
            } else if (userInput.toLowerCase().contains("how are you")) {
                System.out.println("I'm a bot, I don't have emotions.");
            } else if (userInput.toLowerCase().contains("what's your name")) {
                System.out.println("My name is Bot. What's yours?");
            } else if (userInput.toLowerCase().contains("bye")) {
                System.out.println("Goodbye. Have a nice day!");
                break;
            } else {
                System.out.println("I'm sorry, I didn't understand your question. Could you please rephrase it?");
            }
        }
    }
}
```

This code creates a bot that responds to user inputs by choosing one of the predefined questions and responses based on the if/else statements. The if statements check if the user input contains certain keywords and then responds with an appropriate statement. If the bot doesn't understand the input, it responds with a generic response asking the user to rephrase their question. The program continues to run until the user inputs "bye".

Note: This is just an example to get you started. You can build on this code and customize it according to your needs and requirements.