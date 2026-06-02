FROM python:3.10-alpine

WORKDIR /app

#Optymalizacja cache
COPY requirements.txt .
RUN pip install --user --no-cache-dir -r requirements.txt

FROM python:3.11-slim

LABEL org.opencontainers.image.authors="Bartosz Kierepka"

WORKDIR /app

COPY --from=builder /root/.local /root/.local
COPY . .

ENV PATH=/root/.local/bin:$PATH

#HEALTHCHECK
HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
  CMD curl -f http://localhost:5000/ || exit 1

EXPOSE 5000

CMD ["python", "app.py"]
