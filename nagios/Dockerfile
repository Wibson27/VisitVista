FROM jasonrivers/nagios:latest

# Add custom Nagios configuration
COPY apache_monitoring.cfg /opt/nagios/etc/objects/
RUN echo "cfg_file=/opt/nagios/etc/objects/apache_monitoring.cfg" >> /opt/nagios/etc/nagios.cfg