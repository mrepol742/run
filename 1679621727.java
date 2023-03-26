//Create an instance of HttpURLConnection class
HttpURLConnection connection = null;

//Create a URL object
URL url = new URL("http://www.example.com");

//Open the connection
connection = (HttpURLConnection) url.openConnection();

//Set the request method
connection.setRequestMethod("GET");

//Get the response code
int responseCode = connection.getResponseCode();

//If the response code is 200 then read the source code of the website
if(responseCode == 200){
    //Create an InputStreamReader object
    InputStreamReader reader = new InputStreamReader(connection.getInputStream());

    //Create a BufferedReader object
    BufferedReader bufferedReader = new BufferedReader(reader);

    String line;

    //Read the source code line by line
    while((line = bufferedReader.readLine()) != null){
        System.out.println(line);
    }
  }

//Close the connection
connection.disconnect();