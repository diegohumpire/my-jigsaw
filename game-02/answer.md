## Answer

I have to be honest, i don't have much experience on concurrency scenarios, especially calling an unstable API. Actually i have some issues when 500 users tap a push notification and the app make 500 requests per second to the API.

So, i have been researching and the simple "solution" is hardware, but YOLO is using the best server in the market then we need solve this through the backend.

I found this on [wikipedia](https://en.wikipedia.org/wiki/Concurrency_pattern) and i checked this patterns 
- [Double checked locking](https://en.wikipedia.org/wiki/Double-checked_locking)
- [Thread pool](https://en.wikipedia.org/wiki/Thread_pool)
- [Active object](https://en.wikipedia.org/wiki/Active_object)
- [Barrier](https://en.wikipedia.org/wiki/Barrier_(computer_science))

And i would choose Thread pool, probably because is very Laravel way (Jobs, Redis and Supervisor). 

I know that _YOLO needs to make synchronous calls to WTF in each request._ but when you send the task to the thread, the task make the call synchronously to WTF

So, a request comes to YOLO (max 10) and each request is sent to the pool (probably 10 threads too) and this threads are busy and locked 5 sec until WTF response, the next request from YOLO goes to the queue on the pool until one locked thread already finish. If WTF goes down, when can retry the task on the thread.

And it this is! 
