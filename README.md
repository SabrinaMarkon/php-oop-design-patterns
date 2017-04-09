Simple object oriented PHP examples of using design patterns as common solutions to common problems, as taught by Jeffrey Way of Laracasts.com:

https://laracasts.com/series/design-patterns-in-php

PHP Design Patterns:
-------------------

1. The Decorator Pattern - /decorator_pattern - For systems, such as a cart, where items are randomly added to a collection that has a base item always included.
2. The Adapter Pattern - /adapter_pattern - We create a class to allow two different INTERFACES to communicate, such as pairing up two different kinds of technology.
3. The Template Method Pattern - /template_method_pattern - When we are worried about CODE DUPLICATION between classes. Put the code that would be duplicated into an ABSTRACT CLASS, then just put specific differences in subclasses.
4. The Strategy Pattern - /strategy_pattern - Multiple ways to execute a particular strategy, such as using an interface for multiple classes so different ones can be swapped out at run time. We force them to be interchangeablew with the common interface.
5. The Chain of Responsibility Pattern - /chain_of_responsibility_pattern - We need multiple things to happen, using a class for each, where after one is found to be right, we go on to the next. This works like middleware in Laravel. Every class can handle the request (by having the abstract method).
6. 