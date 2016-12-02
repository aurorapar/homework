import sys

class StackClass:

    def __init__(self, itemlist=[]):
        self.items = itemlist

    def isEmpty(self):
        if self.items == []:
            return True
        else:
            return False

    def peek(self):
        return self.items[-1:][0]

    def pop(self):
        return self.items.pop()

    def push(self, item):
        self.items.append(item)
        return 0

def infixtopostfix(infixexpr):

    s=StackClass()
    outlst=[]
    prec={}
    prec['/']=3
    prec['*']=3
    prec['+']=2
    prec['-']=2
    prec['(']=1
    oplst=['/','*','+','-']

    tokenlst=infixexpr
    for token in tokenlst:
        if token in 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' or token in '0123456789':
            outlst.append(token)

        elif token == '(':
            s.push(token)

        elif token == ')':
            topToken=s.pop()
            while topToken != '(':
                outlst.append(topToken)
                topToken=s.pop()
        else:
            while (not s.isEmpty()) and (prec[s.peek()] >= prec[token]):
                #print token
                outlst.append(s.pop())
                #print outlst

            s.push(token)
            #print (s.peek())

    while not s.isEmpty():
        opToken=s.pop()
        outlst.append(opToken)
        #print outlst
    return outlst
    #return " ".join(outlst)
    
def evalPostfix(text):
    s = StackClass()
    for symbol in text:
        try:
            result = int(symbol)
        except ValueError:
            if symbol not in '+-*/':
                raise ValueError('text must contain only numbers and operators')
            expression = '%d %s %d' % (s.pop(), symbol, s.pop())
            #print('Trying %s'%expression)
            result = eval(expression)
        s.push(result)
    return s.pop() 

input = []
for x in range(1, len(sys.argv)):
    input.append(sys.argv[x])
output = ""
for x in infixtopostfix(input):
    output += x
print(output)
print(evalPostfix(output))

