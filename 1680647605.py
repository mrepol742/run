def permutation(list): 
    if len(list) == 0: 
        return [] 
    if len(list) == 1: 
        return [list] 
    l = [] 
    for i in range(len(list)): 
       m = list[i] 
       remLst = list[:i] + list[i+1:] 
       for p in permutation(remLst): 
           l.append([m] + p) 
    return l 

print(permutation([1,2,3]))