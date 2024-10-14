# **Cloud Infrastructure Deployment Using AWS - VPC Peering, RDS, EC2, and IAM Roles**

### **Overview**
This project demonstrates the deployment of a cloud infrastructure on **Amazon Web Services (AWS)**. The setup includes:
- **VPC Peering** between two custom VPCs (App-VPC and Data-VPC).
- Deployment of a **PostgreSQL RDS instance** in a private subnet within **Data-VPC**.
- Hosting a **PHP application** on an **EC2 instance** in **App-VPC** to interact with the RDS instance.
- Setting up **IAM roles** for Backend Developer, Frontend Developer, and Cloud Architect with proper policies.

### **Architecture Components**
1. **VPC Peering**: 
   - Established peering connection between **App-VPC** (with public and private subnets) and **Data-VPC** (with private subnets).
   - Configured route tables to allow traffic flow between the VPCs.

2. **RDS Instance (PostgreSQL)**:
   - The RDS instance is deployed in the **private subnet** of **Data-VPC** and is inaccessible from the internet.
   - This RDS instance is queried by the PHP application hosted on the EC2 instance.

3. **EC2 Instance**:
   - Deployed in the **public subnet** of **App-VPC** with **Apache** and **PHP** installed.
   - The PHP application is configured to connect to the RDS instance using its private IP address.

4. **IAM Roles**:
   - Created specific IAM roles for:
     - **Backend Developer**: Full access to RDS, read-only access to EC2.
     - **Frontend Developer**: Read-only access to S3 and EC2.
     - **Cloud Architect**: Full administrative access to AWS services.
    
### **Prerequisites**
To replicate this setup, we will need:
- An AWS account with the necessary IAM permissions to create VPCs, EC2 instances, RDS instances, and IAM roles.
- Basic knowledge of AWS services and CLI.

### **Steps to Deploy**
1. **Create VPCs**: Set up **App-VPC** and **Data-VPC**, configure subnets, and create a **VPC Peering connection**.
2. **Deploy RDS**: Launch a **PostgreSQL RDS instance** in a private subnet within **Data-VPC**.
3. **Launch EC2 Instance**: In **App-VPC**, create an EC2 instance in the public subnet, install **Apache** and **PHP**, and deploy the PHP application.
4. **Set Up IAM Roles**: Create the appropriate IAM roles for developers and the Cloud Architect.
5. **Test Connectivity**: Ensure that the PHP application on the EC2 instance can query the RDS instance via the VPC peering connection.

### **Technologies Used**
- **Amazon Web Services (AWS)**: VPC, EC2, RDS, IAM
- **PostgreSQL**: For database management
- **PHP**: For web application development
- **Apache**: Web server for hosting PHP application

### **Conclusion**
This project showcases the deployment of a robust cloud infrastructure using AWS services with a focus on security, scalability, and proper role-based access control. The setup adheres to best practices such as placing sensitive resources in private subnets and enforcing least-privilege IAM roles for different user types.
