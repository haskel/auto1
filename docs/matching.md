
# Matching algorithm

The goal of the algorithm is to give a rank for each vacancy, 
reflecting the correspondence of the incoming parameters to the parameters of the vacancy. 
The higher the rank, the better the match.

Rank is multiplication of the parameter's rank. 
Why is the multiplication chosen and not the sum?
To be able to zero out the rank in a case of filtering.
```
Rank = Multiplication( paramRank )
```
Now tha service supports these parameters:
* `skills` - multiplying + cutoff factor
* `salary` - multiplying + cutoff factor
* `location` - cutoff factor
* `seniority` - cutoff factor
* `companyDomain` - cutoff factor

Cutoff factor can be zero, 
and it means that at least one cutoff factor equals zero can zero out full vacancy rank.

Multiplying factor is a positive number greater than 1.

---

Despite the potential speedup, 
so as not to complicate the code early on, 
I decided not to build any indexes, 
because it could reduce understanding.

If indices are needed, 
the best solution would be to take a compact solution, 
for example SQLite.