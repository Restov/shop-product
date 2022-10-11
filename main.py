num = 3564
#minium 4 digits number using num

tis = num // 1000
print(tis)
sot = (num % 1000) // 100
print(sot)
des = (num % 100) // 10
print(des)
edn = num % 10
print(edn)

ans = ""
def findMinDigit(num):
    if num < 10:
        return num
    else:
        return findMinDigit(num // 10)

print(findMinDigit(num))
print(ans)