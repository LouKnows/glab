# PHP VERSION OF RETRIEVING TEXT DATA FROM THE SUBSCRIBER USING GLOBE LAB

For more info about globe lab, visit this link:
https://www.globelabs.com.ph/docs/#sms

File Functions:

<h3>= composer.json =</h3>
<ul>
<li> an empty file for heroku to detect the type of build to use. In this case, PHP.</li>
<li> not important for this app. This is heroku specifics only.</li>
</ul>


<h3>= notify_uri.php =</h3>
<ul>
<li> used to save incoming text message from the subscriber.</li>
<li> only saved the text message and the subscriber's mobile number</li>
<li> As defined by the globe lab, when the subscriber sends a message to the "short code" of the application, it will send a json POST data to your 'notify uri'.</li>
<li> Your 'notify uri' is the link that you've placed under 'API Type'.</li>
<li> Make sure that the link specified there will handle the json data being sent from global lab.</li>
<li> In this case, this file handles the json data.</li>
</ul>

<p>How this file works:</p>

<pre><code>require('dbconnect.php');</code></pre>
- use to connect the database. I'm using MYSQLI extension for this. If you're using PDO, update the dbconnect.php file.

<br><br>
<pre><code> $json_str = file_get_contents('php://input');</code></pre>
- gets the json string being sent from global lab. But it is still a string, we still need to parse it so that we can use every element inside the string.

<p>The json string looks like this (as specified by globe lab): http://www.globelabs.com.ph/docs/#sms-receiving-sms-sms-mo<p>
<pre>
</code>
{
  "inboundSMSMessageList":{
      "inboundSMSMessage":[
         {
            "dateTime":"Fri Nov 22 2013 12:12:13 GMT+0000 (UTC)",
            "destinationAddress":"tel:21581234",
            "messageId":null,
            "message":"Hello",
            "resourceURL":null,
            "senderAddress":"tel:+639171234567"
         }
       ],
       "numberOfMessagesInThisBatch":1,
       "resourceURL":null,
       "totalNumberOfPendingMessages":null
   }
}
</code>
</pre>

<br><br>
<pre><code> $json_obj = json_decode($json_str, true);</code></pre>
- this will parse the json string so that we can access each element via associative array. So for example if we want to retrieve the message "Hello" on the example json data above , we can do something like this:

<span style="padding: 5px; background-color: yellow;"><code>$json_obj['inboundSMSMessageList']['inboundSMSMessage'][0]['message']</code></span>

that statement will have the value "Hello".

<br><br>
<pre><code> 
    $msg_list = $json_obj['inboundSMSMessageList'];
    $inbound_msg_info = $msg_list['inboundSMSMessage'][0];
    
    $msg = $inbound_msg_info['message'];
    $sender = $inbound_msg_info['senderAddress'];
</code></pre>
- Retrieve the text message and the mobile number.
- You can actually do this in one line. But for readability purposes, I just break it into pieces.

<br><br>
<pre><code>  
    $sql = "insert into messages (text_msg, sender) values ('#{$msg}', '#{$sender}')";
    $conn->query($sql);
</code></pre> 

<ul>
<li> Executes the query to insert the text msg and mobile number to the database.</li>
</ul>



<br><br>
<h3>= dbconnect.php =</h3>
<li> database configuration is here.</li>
<li> include this file to any file that requires connection to the database.</li>
<li>this is included in "create_message_from_glab.php" and "get_messages.php"</li>

<br><br>
<h3>= get_messages.php =</h3>
<li> Retrieves all the messages from the database and store it in an associative array variable $messages for later use.</li>
<li> This is included in "index.php"</li>


<br><br>
<h3>= index.php =</h3>
<ul>
<li> Displays all the messages.</li>
</ul>
