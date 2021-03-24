# Explanatory note.
### Implementation choice

After reading the terms of the task, I realized that it is quite simple, 
and my first question was, can I implement it easier?
The thing is I only need 3 endpoints:
1) vacancy item
2) vacancies list with filter
3) matching
   
Considering the number of vacancies, supporting for only two filters and two sorts, which means having low data variability, 
I can simply generate all the necessary results in advance and put them in the files.

But I can't do it with matching. Accordingly, I still need some kind of executable code.

Considering that I do not make difficult decisions, `nginx` + `lua` would be an excellent choice. 
In this case, the service built on `OpenResty` and functional tests built on `phpunit` would be as compact as possible, and the time for its development would be minimal.

But the conditions of the task contain quite a lot of requirements regarding the php code, 
so I decided not to risk and implemented the classic solution based on a symfony.

### My vacancy match
Regarding the point "Also, provide a payload which will fetch the most interesting position for you from the endpoint".


This is my match:
http://localhost/matching/best?skills[]=symfony&skills[]=docker&seniorityLevels[]=Senior



