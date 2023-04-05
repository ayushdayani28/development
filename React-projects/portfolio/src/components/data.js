
const data = {
    'SBU': {
        'school':"Stony Brook University",
        'degree':"Master of Science",
        'program':"Computer Science",
        'duration':"Aug 2021 - Dec 2022",
        'graduated':true,
        'courses':["Data Science", "Computer Vision", "Distributed Systems", "Big Data Analytics", "Probablity & Statistics", "Big Data Algorithms & Networks"],
        'Desc':`Consistently ranked among the top computer science programs in the nation, the Department of Computer Science (CS) at Stony Brook University has a proud history and even brighter future. 
                Notable alumni include John Hennessy '75 MS '77 PhD, former president of Stanford University; Jon Oringer 'BS 96, CEO and Founder of Shutterstock, Inc; and Ben Shneiderman '78 PhD, our first PhD recipient and creator of the hyperlink.`,
        'Address':'',
        'Affiliation':'State University of New York(SUNY)',
        'GPA':3.53,
        'Bounds':4,
        'img':'https://upload.wikimedia.org/wikipedia/en/thumb/1/1d/Stony_Brook_University_seal.svg/1024px-Stony_Brook_University_seal.svg.png',
        'bimg':'https://news.stonybrook.edu/wp-content/uploads/2018/09/featured-campus.jpg'
    },
    'GTU': {
        'school':"Gujarat Tech University",
        'degree':"Bachelor of Engineering",
        'program':"Computer Engineering",
        'duration':"Aug 2016 - Aug 2020",
        'graduated':true,
        'courses':["Python", "Java", "Object Oriented Programming", "Web Developement", "Analysis of Algorithms", "Artificial Intelligence", "Software Engineering", "Operating Systems", "Data Structures", "Computer Networks & Organization"],
        'Desc':`Gujarat Technological University is a premier academic and research institution which has driven new ways of thinking since its 2007 founding, established by the Government of Gujarat vide Gujarat Act No. 20 of 2007.`,
        'Address':'',
        'Affiliation':"GTU",
        'GPA':8.6,
        'Bounds':10,
        'img':'https://upload.wikimedia.org/wikipedia/en/9/93/Gujarat-Technological-University-Logo.png',
        'bimg':'https://www.old22.gtu.ac.in/images/ContactC.jpg'
    },
    'DCS':{
        'school':"Divine Child School",
        'degree':"XII",
        'program':"Science",
        'duration':"2015-2016",
        'graduated':true,
        'courses':["Mathematics", "Physics", "Biology", "Chemistry", "English"],
        'Desc':`Divine Child School, Mehsana is founded by Bhanuvijayji Universal Foundation, which is very popular for Shankus Water Park, the first Water Park in India and Shankus Nature Health Center, a famous Naturopathy Center at Mehsana. It is a day cum residential school affiliated to C.B.S.E. New Delhi. The Management of Shankus group has proved its eminence and efficiency in the field of education from its pioneer institute Divine Child School, adjoining Shankus Water Park, Mehsana. It takes pride in providing child-centric, innovative and global standards of education since its inception in 1994. `,
        'Address':'',
        'Affiliation':"CBSE",
        'GPA':'84%',
        "Bounds":"100%",
        'img':'https://is1-ssl.mzstatic.com/image/thumb/Purple126/v4/ab/ac/b7/abacb7c2-46eb-08ee-ca62-91e9a5ddc47d/AppIcon-DCS_Mehsana-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/1200x630wa.png',
        'bimg':'http://uploads.edubilla.com/institution/d5/62/divine_child_school1.jpg'
    }

}

const workEx = {
    'gwr':{
        'comp':'Guidewire Software',
        'duration':'May 2022 - Aug 2022',
        'desg':'Machine Learning Engineer Intern',
        'desc':'Responsible for transforming Data models into Reproducible, Maintainable and Modular Data models using Kedro Framework and creating a Pipeline to run models into production.'
    },
    'sbu':{
        'comp':'Stony Brook University',
        'duration':'Aug 2022 - Dec 2022',
        'desg':'Teaching Assistant: CSE 101 Computer Science Fundamentals',
        'desc':'Assisting students with doubts and grading python assignments for Course CSE-101 under professor Kevin McDonell along with other TA responsibilities until December 2022.'
    },
    'vte':{
        'comp':'Stony Brook University',
        'duration':'Feb 2023 - Current',
        'desg':'Volunteer Assistant @ SBU BMI lab',
        'desc':'Volunteerily assisting Prof Fusheng Wang and PhD students under him for the Bio Medical Imaging reasearch work.'
    }
}

const lang = {
    'python':{
        'id':1,
        'h':'images/tech-icons/python3.png',
        'uh':'images/tech-icons/python2.png',
        'level':95
    },
    'java':{
        'id':2,
        'h':'images/tech-icons/java4.png',
        'uh':'images/tech-icons/java3.png',
        'level':70
    },
    'javascript':{
        'id':3,
        'h':'images/tech-icons/javascript3.png',
        'uh':'images/tech-icons/javascript2.png',
        'level':85
    },
    'react':{
        'id':4,
        'h':'images/tech-icons/react3.png',
        'uh':'images/tech-icons/react2.png',
        'level':85
    },
    'html':{
        'id':5,
        'h':'images/tech-icons/html3.png',
        'uh':'images/tech-icons/html2.png',
        'level':90
    },
    'css':{
        'id':6,
        'h':'images/tech-icons/css3.png',
        'uh':'images/tech-icons/css2.png',
        'level':80
    },
    'pandas':{
        'id':7,
        'h':'images/tech-icons/pandas3.png',
        'uh':'images/tech-icons/pandas2.png',
        'level':65
    },
    'sql':{
        'id':8,
        'h':'images/tech-icons/mysql3.png',
        'uh':'images/tech-icons/mysql2.png',
        'level':70
    },
    'numpy':{
        'id':9,
        'h':'images/tech-icons/numpy3.png',
        'uh':'images/tech-icons/numpy2.png',
        'level':70
    },
    'github':{
        'id':10,
        'h':'images/tech-icons/github3.png',
        'uh':'images/tech-icons/github2.png',
        'level':75
    },
    'git':{
        'id':11,
        'h':'images/tech-icons/git3.png',
        'uh':'images/tech-icons/git2.png',
        'level':70
    },
    'swift':{
        'id':12,
        'h':'images/tech-icons/c-swift.png',
        'uh':'images/tech-icons/d-swift.png',
        'level':60
    },
    'tensorflow':{
        'id':13,
        'h':'images/tech-icons/c-tensorflow.png',
        'uh':'images/tech-icons/d-tensorflow.png',
        'level':70
    },
    'Hadoop':{
        'id':14,
        'h':'images/tech-icons/c-hadoop.png',
        'uh':'images/tech-icons/d-hadoop.png',
        'level':70
    },
    'spark':{
        'id':15,
        'h':'images/tech-icons/c-spark.png',
        'uh':'images/tech-icons/d-spark.png',
        'level':75
    },
    'django':{
        'id':16,
        'h':'images/tech-icons/c-django.png',
        'uh':'images/tech-icons/d-django.png',
        'level':55
    },
}

const certi = [
    {
        'name' : 'Artificial Intelligence',
        'img' : 'images/aicert.png',
        'venue':'Bits Edu Campus',
        'desc': 'A two days workshop to get familiar with AI practices and implementation of Machine and Deep Learning for practical usecase.',
        'link':''
    },
    {
        'name' : 'Data Science',
        'img' : 'images/dataScience-cert.png',
        'venue': 'Udemy (Online)',
        'desc': 'This course has been designed by a Data Scientist and a Machine Learning expert for intermediate learners to help the, learn complex theory, algorithms, and coding libraries in a simple way.',
        'link': 'https://www.udemy.com/certificate/UC-BCG35F41/'
    },
    {
        'name' : 're:Invent',
        'img' : 'images/reinvent-cert.png',
        'venue': 'Bits Edu Campus',
        'desc': 'A Zonal-Level Tech Fest where we won and secured 1st Rank. We developed a management system for the competition',
        'link':''
    }
]
const learn ={
    'tech':{
        'react':{
            'id':0,
            'course':'React',
            'pf':'Scrimba',
            'inst':'Bob Ziroll',
            'link':'https://scrimba.com/learn/learnreact',
            'status':100,
            'img':'https://res.cloudinary.com/practicaldev/image/fetch/s--eorO9wG8--/c_imagga_scale,f_auto,fl_progressive,h_900,q_auto,w_1600/https://thepracticaldev.s3.amazonaws.com/i/uj3rinstz7aaj1fddl51.jpeg',
            'color':'aqua'
        },
        'swift':{
            'id':1,
            'course':'iOS & Swift Development',
            'pf':'Udemy',
            'inst':'Dr. Angela Yu',
            'link':'https://www.udemy.com/course/ios-13-app-development-bootcamp/',
            'status':25,
            'img':'https://www.oneclickitsolution.com/blog/wp-content/uploads/2020/10/swift-vs-objective-c.png',
            'color':'white'
        }
    },
    'readings':{
        'homl':{
            'id':0,
            'book':'Hands on Machine Learning',
            'auth':'Aurélien Géron',
            // 'status':70,
           
            'img':'https://learning.oreilly.com/library/cover/9781098125967/250w/',
            'link':'https://www.amazon.com/Hands-Machine-Learning-Scikit-Learn-TensorFlow/dp/1098125975'
        },
        'dl':{
            'id':1,
            'book': 'Deep Learning: An MIT Pressbook',
            'auth':'Ian Goodfellow, Yoshua Bengio, Aaron Courville',
            // 'status':20,
            'img':'https://books.google.com/books/publisher/content?id=omivDQAAQBAJ&pg=PP1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U2oJY9CPUGAaMdeaNFZxFPbGyIaAw&w=1280',
            'link':'https://www.amazon.com/Deep-Learning-Adaptive-Computation-Machine/dp/0262035618'
        },
        'dbms':{
            'id':2,
            'book':'Database Management Systems',
            'auth':'Raghu Ramakrishnan, Johannes Gehrke',
            'img':'https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/41jzTIhCQJL.jpg',
            'link':'https://www.amazon.com/Database-Management-Systems-Raghu-Ramakrishnan/dp/0072465638'
        }
    }
}

const projects = [

    {name:'Kedro', keywords:['python', 'AWS', 'kedro', 'hadoop', 'pyspark', 'docker', 'guidewire software internship','sql', 'redshift','pipeline', 'data engineering', 'machine learning engineer','dag',]
    ,desc:'', tech:['Python', 'SQL', 'AWS', 'kedro', 'pyspark', 'Apache Hadoop', 'Redshift'], duration:'May/22 - Aug/22', association:'Guidewire Software', img:'', projectLink:''},

    {name:'Poverty UN SDG', keywords:['Python', 'Apache', 'GCP', 'google cloud platform', 'hadoop', 'pyspark', 'stony brook university SBU', 'pipeline', 'image processing', 'distributed tensorflow', 'ARIMA', 'data engineering', 'machine learning engineer','UN SDG united nations sustainable development goals poverty', 'prediction', 'time series analysis', 'analysis', 'GIS geographical information system', 'satellite image']
    ,desc:'', tech:['Python','pyspark', 'Apache Hadoop', 'GCP', 'Tensorflow', 'GIS', 'Tensorflow'], duration:'Apr/22 - May/22', association:'SBU: Big Data Analytics', img:'', projectLink:''},
    
    {name:'Bio-Medical Imaging', keywords:['Bio Medical Imaging','Python', 'postgres', 'hadoop', 'spatial analysis queries', 'sql', 'big data analysis computation', 'indexing', 'Stony Brook University sbu']
    ,desc:'', tech:['Python', 'postgres', 'pyspark', 'Apache Spark', 'Apache Hadoop'], duration:'Jan/22 - Dec/22', association:'SBU: Advanced Project', img:'', projectLink:'Private Project'},
    
    {name:'US Covid Vaccination Analysis', keywords:['Python', 'Data Science','pipeline', 'data engineering', 'vaccination vaccine analysis', 'prediction', 'machine learning', 'visualization', 'scikit learn matplotlib pandas numpy', 'feature engineering']
    ,desc:'', tech:['Python', 'Data Science and ML Libraries', 'Jupyter', 'visualization Tools & techniques'], duration:'Aug/21 - Dec/21', association:'SBU: Data Science', img:'', projectLink:''},
    
    {name:'DiemBFT Consensus & Twins Testing', keywords:['Python', 'Distributed Systems', 'State machine replication', 'Stony Brook University SBU', 'dist algo distalgo', 'fault tolerant', 'consensus', 'ledger', 'twin bft twinbft',]
    ,desc:'', tech:['Distributed Systems', 'State Machine Replication', 'Python','DistAlgo'], duration:'Aug/21 - Dec/21', association:'SBU: Distributed Systems', img:'', projectLink:''},
    
    {name:'FarmShield', keywords:['Python', 'c++', 'arduino', 'iot', 'android programming', 'Gujarat Technological University', 'gtu', 'platform']
    ,desc:'', tech:['Python', 'C++', 'Object Oriented Programming', 'Arduino and Android Programming'], duration:'Aug/2019 - May/2020', association:'GTU: Project', img:'', projectLink:'Private Project'},
    
    {name:'iBIN', keywords:['bootstrap', 'jQuery', 'Javascript', 'php laravel framework', 'MySQL', 'Gujarat Technological University', 'gtu', 'web platform',]
    ,desc:'', tech:['Bootstrap', 'jQuery', 'Javascript', 'Php Laravel framework', 'MySQL'], duration:'Aug/2018 - May/2019', association:'GTU: Design Engineering', img:'', projectLink:''},

    {name:'Portfolio', keywords:['portfolio', 'javascript', 'react', 'scrimba', 'self learn learning projects', 'node node.js nodejs express expressjs', 'HTML', 'CSS']
    ,desc:'', tech:['Javascript', 'React', 'HTML', 'CSS'], duration:'', association:'Self-Learning Projects', img:'', projectLink:''},

    {name:'Notes App', keywords:['notes app', 'javascript', 'react', 'scrimba', 'self learn learning projects', 'HTML', 'CSS']
    ,desc:'', tech:['Javascript', 'React', 'HTML', 'CSS'], duration:'', association:'Self-Learning Projects', img:'', projectLink:''},

    {name:'Tenzies', keywords:['tenzies', 'javascript', 'react', 'scrimba', 'self learn learning projects', 'HTML', 'CSS']
    ,desc:'', tech:['Javascript', 'React', 'HTML', 'CSS'], duration:'', association:'Self-Learning Projects', img:'', projectLink:''},

    {name:'Business Card', keywords:['business card', 'javascript', 'react', 'scrimba', 'self learn learning projects', 'HTML', 'CSS']
    ,desc:'', tech:['Javascript', 'React', 'HTML', 'CSS'], duration:'', association:'Self-Learning Projects', img:'', projectLink:''},

    {name:'Travel Journal', keywords:['travel journal', 'javascript', 'react', 'scrimba', 'self learn learning projects', 'HTML', 'CSS']
    ,desc:'', tech:['Javascript', 'React', 'HTML', 'CSS'], duration:'', association:'Self-Learning Projects', img:'', projectLink:''},

    {name:'Miscellaneous', keywords:['miscellaneous', 'javascript', 'scrimba', 'self learn learning projects', 'HTML', 'CSS']
    ,desc:'', tech:['Javascript', 'HTML', 'CSS'], duration:'', association:'Self-Learning Projects', img:'', projectLink:''},

]

export {data, workEx, lang, certi, learn, projects}