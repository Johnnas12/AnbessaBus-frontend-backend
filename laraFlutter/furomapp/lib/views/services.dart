import 'package:flutter/material.dart';

class ServicesPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Services Page'),
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            Image.asset(
              'assets/img/car1.jpg', // Add your own image asset here
              fit: BoxFit.cover,
            ),
            Padding(
              padding: EdgeInsets.all(16.0),
              child: Text(
                'Welcome to our Bus System App! Explore our comprehensive range of services and enjoy a seamless travel experience.',
                style: TextStyle(fontSize: 18.0),
              ),
            ),
            Padding(
              padding: EdgeInsets.all(16.0),
              child: Text(
                'Our Services',
                style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
              ),
            ),
            ServiceItem(
              title: 'Regular scheduled service',
              description:
                  'It is a service given by the enterprise to the commuters based on time table with 119 fixed routes.  the services are operated:- Three depots (Yeka, Shegole and Mekanissa). Four Bus terminales in Legehar, Merkato, Menilik,Square and Megenagna. Twenty eight check points(destination) One thousand four hunderd fourteen bus stops.',
            ),
            ServiceItem(
              title: 'Ticket Booking',
              description:
                  'Forget long queues and last-minute rush! Book your bus tickets instantly through our user-friendly app. Select your desired route, choose your seat, and make secure payments within seconds. Enjoy a hassle-free ticketing experience!',
            ),
            ServiceItem(
              title: 'Premium Service',
              description:
                  'It is a service given by the enterprise to government or nongovernment organizations, schools and other institutions. It is based on distance covered and agreed with the user ahead of time.',
            ),
            ServiceItem(
              title: 'Fare Information',
              description:
                  'Access comprehensive fare information for different bus routes. Our app provides details on ticket prices, distance. Make informed decisions about your travel expenses.',
            ),
            ServiceItem(
              title: 'Special service',
              description:
                  'It is a service given when special occasion occurs like mourning, meeting and festivity based on kilometer and duration of service. Maintenance Service',
            ),
        
          ],
        ),
      ),
    );
  }
}

class ServiceItem extends StatelessWidget {
  final String title;
  final String description;

  ServiceItem({required this.title, required this.description});

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.all(16.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            title,
            style: TextStyle(fontSize: 20.0, fontWeight: FontWeight.bold),
          ),
          SizedBox(height: 8.0),
          Text(description),
        ],
      ),
    );
  }
}
