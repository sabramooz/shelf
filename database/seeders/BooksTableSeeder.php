<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Clean Code: A Handbook of Agile Software Craftsmanship',
                'author' => 'Robert C. Martin',
                'language' => 'English',
                'publisher' => 'Prentice Hall',
                'price' => 45.00,
                'pages' => 464,
                'isbn' => '978-0132350884',
                'image' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80',
                'summary' => 'Even bad code can function. But if code isn\'t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code.'
            ],
            [
                'title' => 'The Mythical Man-Month: Essays on Software Engineering',
                'author' => 'Frederick Brooks Jr.',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 38.99,
                'pages' => 322,
                'isbn' => '978-0201835953',
                'image' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=1486&q=80',
                'summary' => 'Few books on software project management have been as influential and timeless as The Mythical Man-Month. With a blend of software engineering facts and thought-provoking opinions, Fred Brooks offers insight for anyone managing complex projects.'
            ],
            [
                'title' => 'Designing Data-Intensive Applications',
                'author' => 'Martin Kleppmann',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 55.50,
                'pages' => 616,
                'isbn' => '978-1449373320',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80',
                'summary' => 'Data is at the center of many challenges in system design today. Difficult issues need to be figured out, such as scalability, consistency, reliability, efficiency, and maintainability.'
            ],
            [
                'title' => 'Code Complete: A Practical Handbook of Software Construction',
                'author' => 'Steve McConnell',
                'language' => 'English',
                'publisher' => 'Microsoft Press',
                'price' => 49.99,
                'pages' => 960,
                'isbn' => '978-0735619678',
                'image' => 'https://images.unsplash.com/photo-1516979187457-637abb4f9353?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Widely considered one of the best practical guides to programming, Steve McConnell\'s original CODE COMPLETE has been helping developers write better software for more than a decade.'
            ],
            [
                'title' => 'Introduction to Algorithms (CLRS)',
                'author' => 'Cormen, Leiserson, Rivest, Stein',
                'language' => 'English',
                'publisher' => 'MIT Press',
                'price' => 75.00,
                'pages' => 1312,
                'isbn' => '978-0262033848',
                'image' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80',
                'summary' => 'This book provides a comprehensive introduction to the modern study of computer algorithms. It presents many algorithms and covers them in considerable depth, yet makes their design and analysis accessible to all levels of readers.'
            ],
            [
                'title' => 'Refactoring: Improving the Design of Existing Code',
                'author' => 'Martin Fowler',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 42.25,
                'pages' => 448,
                'isbn' => '978-0134757599',
                'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1373&q=80',
                'summary' => 'Refactoring is about improving the design of existing code. It is the process of changing a software system in such a way that it does not alter the external behavior of the code, yet improves its internal structure.'
            ],
            [
                'title' => 'The DevOps Handbook',
                'author' => 'Gene Kim, Patrick Debois, John Willis, Jez Humble',
                'language' => 'English',
                'publisher' => 'IT Revolution Press',
                'price' => 39.50,
                'pages' => 480,
                'isbn' => '978-1942788003',
                'image' => 'https://images.unsplash.com/photo-1621839673705-6617adf9e890?ixlib=rb-4.0.3&auto=format&fit=crop&w=1432&q=80',
                'summary' => 'The DevOps Handbook shows leaders how to replicate these incredible outcomes, by showing how to integrate Product Management, Development, QA, IT Operations, and Information Security.'
            ],
            [
                'title' => 'Structure and Interpretation of Computer Programs',
                'author' => 'Harold Abelson, Gerald Jay Sussman',
                'language' => 'English',
                'publisher' => 'MIT Press',
                'price' => 60.00,
                'pages' => 657,
                'isbn' => '978-0262510875',
                'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Structure and Interpretation of Computer Programs has had a dramatic impact on computer science curricula over the past decade.'
            ],
            [
                'title' => 'Accelerate: The Science of Lean Software and DevOps',
                'author' => 'Nicole Forsgren, Jez Humble, Gene Kim',
                'language' => 'English',
                'publisher' => 'IT Revolution Press',
                'price' => 34.75,
                'pages' => 288,
                'isbn' => '978-1942788331',
                'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'How can we apply technology to drive business value? This book provides insights into software delivery performance.'
            ],
            [
                'title' => 'JavaScript: The Good Parts',
                'author' => 'Douglas Crockford',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 29.99,
                'pages' => 176,
                'isbn' => '978-0596517748',
                'image' => 'https://images.unsplash.com/photo-1627398242454-45a1465c2479?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80',
                'summary' => 'Most programming languages contain good and bad parts, but JavaScript has more than its share of the bad, having been developed and released in a hurry.'
            ],
            [
                'title' => 'System Design Interview: An Insider\'s Guide',
                'author' => 'Alex Xu',
                'language' => 'English',
                'publisher' => 'ByteByteGo',
                'price' => 39.99,
                'pages' => 322,
                'isbn' => '978-0578973838',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'System design interviews are the most challenging part of the technical interview. This book provides a step-by-step framework to tackle system design questions.'
            ],
            [
                'title' => 'Docker Deep Dive',
                'author' => 'Nigel Poulton',
                'language' => 'English',
                'publisher' => 'Self-Published',
                'price' => 32.50,
                'pages' => 368,
                'isbn' => '978-1521822807',
                'image' => 'https://images.unsplash.com/photo-1605745341112-85968b19335b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Docker Deep Dive is the fastest way to get up to speed with Docker. This book will give you a strong foundation in Docker.'
            ],
            [
                'title' => 'Kubernetes in Action',
                'author' => 'Marko Luksa',
                'language' => 'English',
                'publisher' => 'Manning Publications',
                'price' => 49.99,
                'pages' => 624,
                'isbn' => '978-1617293726',
                'image' => 'https://images.unsplash.com/photo-1667372393119-3d4c48d07fc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1632&q=80',
                'summary' => 'Kubernetes in Action teaches you to use Kubernetes to deploy container-based distributed applications.'
            ],
            [
                'title' => 'Building Microservices',
                'author' => 'Sam Newman',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 44.99,
                'pages' => 280,
                'isbn' => '978-1491950357',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=1361&q=80',
                'summary' => 'Distributed systems have become more fine-grained in the past decade, shifting from code-heavy monolithic applications to smaller, self-contained microservices.'
            ],
            [
                'title' => 'You Don\'t Know JS: Scope & Closures',
                'author' => 'Kyle Simpson',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 24.99,
                'pages' => 98,
                'isbn' => '978-1449335588',
                'image' => 'https://images.unsplash.com/photo-1592609931095-54a2168ae893?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'No matter how much experience you have with JavaScript, odds are you don\'t fully understand the language. This guide takes you inside scope and closures.'
            ],
            [
                'title' => 'High Performance MySQL',
                'author' => 'Baron Schwartz, Peter Zaitsev, Vadim Tkachenko',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 59.99,
                'pages' => 826,
                'isbn' => '978-1449314286',
                'image' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1421&q=80',
                'summary' => 'With High Performance MySQL, you\'ll learn advanced techniques for everything from designing schemas, indexes, and queries to tuning your MySQL server.'
            ],
            [
                'title' => 'Learning React',
                'author' => 'Alex Banks, Eve Porcello',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 47.99,
                'pages' => 310,
                'isbn' => '978-1492051718',
                'image' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'If you want to learn how to build efficient React applications, this is your book. Ideal for web developers and software engineers.'
            ],
            [
                'title' => 'Effective Java',
                'author' => 'Joshua Bloch',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 54.99,
                'pages' => 412,
                'isbn' => '978-0134685991',
                'image' => 'https://images.unsplash.com/photo-1541228232134-ab2e60095b42?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80',
                'summary' => 'Written by the architect of the Java Collections Framework, Effective Java is the definitive guide to writing effective, efficient, and maintainable Java code.'
            ],
            [
                'title' => 'Grokking Algorithms',
                'author' => 'Aditya Bhargava',
                'language' => 'English',
                'publisher' => 'Manning Publications',
                'price' => 39.99,
                'pages' => 256,
                'isbn' => '978-1617292231',
                'image' => 'https://images.unsplash.com/photo-1509966756634-9c23dd6e6815?ixlib=rb-4.0.3&auto=format&fit=crop&w=1376&q=80',
                'summary' => 'Grokking Algorithms is a fully illustrated, friendly guide that teaches you how to apply common algorithms to practical problems.'
            ],
            [
                'title' => 'Python Crash Course',
                'author' => 'Eric Matthes',
                'language' => 'English',
                'publisher' => 'No Starch Press',
                'price' => 39.95,
                'pages' => 544,
                'isbn' => '978-1593279288',
                'image' => 'https://images.unsplash.com/photo-1526379095098-d400fd0bf935?ixlib=rb-4.0.3&auto=format&fit=crop&w=1632&q=80',
                'summary' => 'Python Crash Course is a fast-paced, thorough introduction to Python that will have you writing programs, solving problems, and making things that work in no time.'
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'David Thomas, Andrew Hunt',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 49.99,
                'pages' => 352,
                'isbn' => '978-0135957059',
                'image' => 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1469&q=80',
                'summary' => 'The Pragmatic Programmer is one of those rare tech books you\'ll read, re-read, and read again over the years. Whether you\'re new to the field or an experienced practitioner.'
            ],
            [
                'title' => 'Head First Design Patterns',
                'author' => 'Eric Freeman, Elisabeth Robson',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 54.99,
                'pages' => 694,
                'isbn' => '978-0596007126',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Head First Design Patterns is a brain-friendly guide to design patterns. You\'ll learn how to create flexible, maintainable object-oriented software.'
            ],
            [
                'title' => 'Eloquent JavaScript',
                'author' => 'Marijn Haverbeke',
                'language' => 'English',
                'publisher' => 'No Starch Press',
                'price' => 39.95,
                'pages' => 472,
                'isbn' => '978-1593279509',
                'image' => 'https://images.unsplash.com/photo-1579468118864-1b9ea3c0db4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Eloquent JavaScript dives into the JavaScript language to show you how to write beautiful, effective code. This is a book about JavaScript, programming, and the wonders of the digital.'
            ],
            [
                'title' => 'The Art of Computer Programming',
                'author' => 'Donald E. Knuth',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 199.99,
                'pages' => 3168,
                'isbn' => '978-0321751041',
                'image' => 'https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'The Art of Computer Programming is a comprehensive monograph written by Donald Knuth that covers many kinds of programming algorithms and their analysis.'
            ],
            [
                'title' => 'Cracking the Coding Interview',
                'author' => 'Gayle Laakmann McDowell',
                'language' => 'English',
                'publisher' => 'CareerCup',
                'price' => 49.95,
                'pages' => 708,
                'isbn' => '978-0984782857',
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Cracking the Coding Interview gives you the interview preparation you need to get the top software developer jobs. This is a deeply technical book and focuses on the software engineering skills to ace your interview.'
            ],
            [
                'title' => 'Domain-Driven Design',
                'author' => 'Eric Evans',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 59.99,
                'pages' => 560,
                'isbn' => '978-0321125217',
                'image' => 'https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Domain-Driven Design fills that need. This is not a book about specific technologies. It offers readers a systematic approach to domain-driven design.'
            ],
            [
                'title' => 'Continuous Delivery',
                'author' => 'Jez Humble, David Farley',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 54.99,
                'pages' => 512,
                'isbn' => '978-0321601919',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1472&q=80',
                'summary' => 'Continuous Delivery is about how to build software in such a way that you could release it to production at any time, on demand.'
            ],
            [
                'title' => 'Site Reliability Engineering',
                'author' => 'Betsy Beyer, Chris Jones, Jennifer Petoff, Niall Murphy',
                'language' => 'English',
                'publisher' => 'O\'Reilly Media',
                'price' => 49.99,
                'pages' => 552,
                'isbn' => '978-1491929124',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1415&q=80',
                'summary' => 'The overwhelming majority of a software system\'s lifespan is spent in use, not in design or implementation. This book explains the whole life cycle of a software system.'
            ],
            [
                'title' => 'Working Effectively with Legacy Code',
                'author' => 'Michael Feathers',
                'language' => 'English',
                'publisher' => 'Prentice Hall',
                'price' => 54.99,
                'pages' => 464,
                'isbn' => '978-0131177055',
                'image' => 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80',
                'summary' => 'This book provides programmers with the ability to cost effectively handle common legacy code problems without having to go through the hugely expensive task of rewriting all existing code.'
            ],
            [
                'title' => 'Test Driven Development',
                'author' => 'Kent Beck',
                'language' => 'English',
                'publisher' => 'Addison-Wesley',
                'price' => 49.99,
                'pages' => 240,
                'isbn' => '978-0321146533',
                'image' => 'https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80',
                'summary' => 'Quite simply, test-driven development is meant to eliminate fear in application development. This book demonstrates how to solve complicated tasks, beginning with the simple and proceeding to the more complex.'
            ],
            [
                'title' => 'Release It!',
                'author' => 'Michael T. Nygard',
                'language' => 'English',
                'publisher' => 'Pragmatic Bookshelf',
                'price' => 47.95,
                'pages' => 378,
                'isbn' => '978-1680502398',
                'image' => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1420&q=80',
                'summary' => 'A single dramatic software failure can cost a company millions of dollars - but can be avoided with simple changes to design and architecture. This book shows you how.'
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
