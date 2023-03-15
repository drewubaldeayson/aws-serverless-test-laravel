The backend programming language I've used is PHP with Laravel framework. 
This is a very easy to implement framework as the boilerplate and scaffolding are already generated initially.
It will really help the coding work of the developer especially when developing APIs or web application.
I am very confident about this programming language and I can create complex web applications in less than a month with this framework.

Let's move on to the architecture and logic of the feature.

This is just a basic MVC, however the Model and View part is not implemented as I don't have enough time to create the UI (View) and the model, which then is interconnected to the database. 

I created an API route which is basically the "https://${server-host-url}/api/v1/weather?postalCode=${postalCode}&countryCode=${countryCode}&apiKey=${apiKey}".

This is connected to the created WeatherController controller in which has a API token authentication that is static for now as I don't have enough time to create a table of AuthenticationKeys with registered Users connected to it. So basically, the API key "f3969c45-f33d-48f0-9ab7-f4f047725a56" should be added in the parameter in order for the GET Weather Status API to work otherwise it will return "Unauthorized Access!", so that's the handling for the API token feature.

The other 2 handling logic are to check whether the postalCode or countryCode has a value. If either of the two 
has no value, it will return just like this: 
    If the postal code parameter is missing:
        {
            "error": "Postal code parameter is missing"
        }
    If the country code parameter is missing:
        {
            "error": "Country code parameter is missing"
        }

If there are no errors in the parameter validation, it will fetch the data from the OpenWeatherApi with the country code, postal code, and the API Key as the main parameters of the URL. 

I added a failed response checker to check if the response is failed, if then it will just return this kind of error
"Something went wrong with the API. Please try again later. We will make sure to log this incident, so it might not happen next time. Thank you for your patience.".

If there are no errors in the response, it will just return the formatted dataset in JSON format. 
I have followed the required response body based on the requirements of this in JSON format.



TODOS Post Summarization:

If I've given enough time, I can create a basic chatbot in a sample page wherein the user can type the postal code of a certain country in the chatbox and the weather details will be displayed by the chatbot.

I can also create a table wherein if there's an error in the response from the third-party API which is the OpenWeatherApi, it will be added as a record in the table.

I also don't have the time to create a unit test functionalities using PHPUnit, if I have the time I will do so.


